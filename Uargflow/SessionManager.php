<?php
namespace Uargflow;

include_once '../vendor/autoload.php';

class SessionManager
{

    /**
     * @var \mysqli
     */
    protected $db;

    /**
     * @var \mysqli_stmt
     */
    protected $read_stmt, $write_stmt;



    function __construct()
    {
        // set our custom session functions.
        session_set_save_handler(array($this, 'open'), array($this, 'close'), array($this, 'read'), array($this, 'write'), array($this, 'destroy'), array($this, 'gc'));

        // This line prevents unexpected effects when using objects as save handlers.
        register_shutdown_function('session_write_close');
    }

    /**
     * 
     * Instancia la conexion a la BD.
     * @see \Uargflow\BDConfig
     * 
     */
    function open()
    {

        $mysqli = new \mysqli(BDConfig::HOST, BDConfig::USUARIO, BDConfig::PASS, BDConfig::SCHEMA_SESIONES);
        $this->db = $mysqli;
        return true;
    }

    /**
     * 
     * Inicia la sesión encriptada en cookie y bd, según las recomendaciones de seguridad vigentes.
     * 
     * @link    https://www.php.net/manual/en/session.security.php
     * @link    https://www.php.net/manual/en/features.session.security.management.php
     * @link    https://www.php.net/manual/en/session.security.ini.php
     * 
     * @see     https://www.php.net/manual/es/function.hash-algos.php Listado de algoritmos hash soportados.
     * 
     * @param string    $session_name   Nombre de la Sesión.
     * @param bool      $secure         Si es verdadero, la cookie de sesión solo será enviada a través de una conexión HTTPS.
     * 
     * @todo 17/10/2022 $session_name   Codificar nombre según aplicación / patrón.
     * 
     */
    function start_session($session_name, $secure)
    {
        // Make sure the session cookie is not accessible via javascript.
        $httponly = true;

        // Hash algorithm to use for the session. (use hash_algos() to get a list of available hashes.)
        $session_hash = 'sha512';

        // Check if hash is available
        if (in_array($session_hash, hash_algos())) {
            // Set the has function.
            ini_set('session.hash_function', $session_hash);
        }
        // How many bits per character of the hash.
        // The possible values are '4' (0-9, a-f), '5' (0-9, a-v), and '6' (0-9, a-z, A-Z, "-", ",").
        ini_set('session.hash_bits_per_character', 5);

        // Force the session to only use cookies, not URL variables.
        ini_set('session.use_only_cookies', 1);

        // Get session cookie parameters 
        $cookieParams = session_get_cookie_params();
        // Set the parameters
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

        // Change the session name 
        session_name($session_name);
        
        // Now we cat start the session
        session_start();
        // This line regenerates the session and delete the old one. 
        // It also generates a new encryption key in the database. 
        session_regenerate_id(true);
    }

    function close()
    {
        $this->db->close();
        return true;
    }

    function read($id)
    {
        if (!isset($this->read_stmt)) {
            $this->read_stmt = $this->db->prepare("SELECT data FROM sessions WHERE id = ? LIMIT 1");
        }
        $this->read_stmt->bind_param('s', $id);
        $this->read_stmt->execute();
        $this->read_stmt->store_result();
        $this->read_stmt->bind_result($data);
        $this->read_stmt->fetch();
        $key = $this->getkey($id);
        $data = $this->decrypt($data, $key);
        return $data;
    }

    function write($id, $data)
    {
        // Get unique key
        $key = $this->getkey($id);
        // Encrypt the data
        $data = $this->encrypt($data, $key);

        $time = time();
        if (!isset($this->write_stmt)) {
            $this->write_stmt = $this->db->prepare("REPLACE INTO sessions (id, set_time, data, session_key) VALUES (?, ?, ?, ?)");
        }

        $this->write_stmt->bind_param('siss', $id, $time, $data, $key);
        $this->write_stmt->execute();
        return true;
    }

    function destroy($id)
    {
        if (!isset($this->delete_stmt)) {
            $this->delete_stmt = $this->db->prepare("DELETE FROM sessions WHERE id = ?");
        }
        $this->delete_stmt->bind_param('s', $id);
        $this->delete_stmt->execute();

        return true;
    }

    function gc($max)
    {
        if (!isset($this->gc_stmt)) {
            $this->gc_stmt = $this->db->prepare("DELETE FROM sessions WHERE set_time < ?");
        }
        $old = time() - $max;
        $this->gc_stmt->bind_param('s', $old);
        $this->gc_stmt->execute();
        return true;
    }

    private function getkey($id)
    {
        if (!isset($this->key_stmt)) {
            $this->key_stmt = $this->db->prepare("SELECT session_key FROM sessions WHERE id = ? LIMIT 1");
        }
        $this->key_stmt->bind_param('s', $id);
        $this->key_stmt->execute();
        $this->key_stmt->store_result();
        if ($this->key_stmt->num_rows == 1) {
            $this->key_stmt->bind_result($key);
            $this->key_stmt->fetch();
            return $key;
        } else {
            $random_key = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            return $random_key;
        }
    }

    private function encrypt($data, $key)
    {
        $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
        $key = substr(hash('sha256', $salt . $key . $salt), 0, 32);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv));
        return $encrypted;
    }
    private function decrypt($data, $key)
    {
        $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
        $key = substr(hash('sha256', $salt . $key . $salt), 0, 32);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($data), MCRYPT_MODE_ECB, $iv);
        $decrypted = rtrim($decrypted, "\0");
        return $decrypted;
    }
}

/**
 * @todo    17/10/2022      Verificar sesión y recién levantar según.
 * @todo    17/10/2022      Diagrama de actividad. Login, Credenciales válidas e inválidas.
 * @todo    17/10/2022      Controles de acceso globales.
 */
if (isset($_POST['nombre'])) {
    $session = new SessionManager();
    // Set to true if using https
    $session->start_session("[SIS_DOGO] {id_Eder}", false);
}

/**
 * Incorpora destrucción temporal del Cookie
 */
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        // $params["httponly"]
        true
    );

}

?>
<form action="" method="POST">
    <input type="text" name="nombre" />
    <input type="submit" />
</form>

<p>Datos de Sesi&oacute;n en $_SESSION : <?php var_dump($_SESSION) ?></p>
<p>Datos de Sesi&oacute;n en $_COOKIE : <?php var_dump($_COOKIE) ?></p>
<?php echo $_SESSION['nombre'];   ?>