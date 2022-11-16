<?php
namespace Cruda;
class Hash {

    private $password;
    private $passwordHash;
    private $metodoEncriptacion;
    
    function __construct($password, $metodoEncriptacion)
    {
        $this->password = $password;
        $this->metodoEncriptacion = $metodoEncriptacion;
        $this->passwordHash = password_hash($password, $metodoEncriptacion);
    }

    /**
     * Ese método JAMÁS DEBE UTILIZARSE EN PRODUCCIÓN.
     * Solo utilizar a modo de prueba y/o ejemplo.
     */
    function getPassword() {
        return $this->password;
    }

    function getPasswordHash()
    {
        return $this->passwordHash;
    }

    function getHashInfo() {
        return password_get_info($this->passwordHash);
    }

    function getNeedsRehash() {
        return password_needs_rehash($this->passwordHash, $this->metodoEncriptacion) ? "SI" : "NO";
    }

    function getHashInfoAlgoritmo() {
        return $this->getHashInfo()['algoName'];
    }

    function verificaPasswordCorrecta($password_ = null) {
        return password_verify($password_, $this->getPasswordHash()) ? "SI" : "NO";
    }

    function __toString()
    {
        return "Password : " . $this->password . " - METODO : " . $this->getHashInfoAlgoritmo() .  " - Necesita rehash : " .  $this->getNeedsRehash()  . " - HASH : " . $this->passwordHash . "<br />";
    }

    /**
     * Este método verifica una password ingresada por el usuario contra un Hash almacenado en alguna fuente de datos (ej.: BD).
     * No es necesario instanciar un objeto.
     * 
     * @uses password_verify()
     * @link https://www.php.net/manual/es/ref.password.php
     */
    static function verificaPasswordHashBD($password_, $hashBD_) {
        return password_verify($password_, $hashBD_);
    }

    /**
     * Este método produce un Hash a partir de una password y un método de encriptación especificados.
     * 
     * @uses password_hash()
     * @link https://www.php.net/manual/es/ref.password.php
     */
    static function creaHash($password_, $metodoEncriptacion_ = PASSWORD_ARGON2I) {
        return password_hash($password_, $metodoEncriptacion_);
    }

}