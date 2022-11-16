<?php

namespace Uargflow;

class SessionManager implements \SessionHandlerInterface
{
    /**
     * @var \mysqli
     */
    private $link;

    static function start_session($session_name, $secure){
        // Make sure the session cookie is not accessible via javascript.
        $httponly = true;

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



    public function open($path, $name): bool{
        $this->link = new \mysqli(BDConfig::HOST, BDConfig::USUARIO, BDConfig::PASS, BDConfig::SCHEMA_SESIONES);

        return true;
    }

    public function close(): bool{
        $this->link->close();
        return true;
    }

    public function read($id): string
    {
        $result = $this->link->query("SELECT Session_Data FROM session WHERE Session_Id = '" . $id . "' AND Session_Expires > '" . date('Y-m-d H:i:s') . "'");
        if ($row = $result->fetch_assoc()) {
            return \Uargflow\SSLHandler::decrypt($row['Session_Data']);
        } else {
            return "";
        }
    }

    public function write($id, $data): bool{
        $DateTime = date('Y-m-d H:i:s');
        $NewDateTime = date('Y-m-d H:i:s', strtotime($DateTime . ' + 1 hour'));
        $result = $this->link->query("REPLACE INTO session SET Session_Id = '" . $id . "', Session_Expires = '" . $NewDateTime . "', Session_Data = '" . \Uargflow\SSLHandler::encrypt($data) . "'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy($id): bool
    {
        $result = $this->link->query("DELETE FROM session WHERE Session_Id ='" . $id . "'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function gc($maxlifetime): bool
    {
        //$result = $this->link->query("DELETE FROM Session WHERE ((UNIX_TIMESTAMP(Session_Expires) + " . $maxlifetime . ") < " . $maxlifetime . ")");
        $result = $this->link->query("DELETE FROM session WHERE Session_Expires <= NOW()");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static function checkUsuario()
    {
        if (!isset($_SESSION['nombre_usuario']))
            header('Location: ' . \Constantes::URL_LOGIN);
    }

    /**
     * @BracamonteF @todo 15/11 Crear dos métodos, CON redirect y SIN redirect 
     */
    static function checkPermiso($idPermiso_)
    {
        $permisos = json_decode($_SESSION['permisos']);
        return (in_array($idPermiso_, $permisos));
    }

    static function checkPermisoRedirect($idPermiso_, $URL = \Constantes::URL_USUARIO)
    {
        if(!self::checkPermiso($idPermiso_)) {
            header('Location: ' . $URL);
        }
    }

}
