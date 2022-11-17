<?php

namespace Cruda;

Class BDConexion extends \mysqli {
    
    public function __construct() {
        parent::__construct(\Cruda\BDConfig::HOST, \Cruda\BDConfig::USUARIO, \Cruda\BDConfig::PASS, \Cruda\BDConfig::SCHEMA);   
        if ($this->connect_error) {
            echo "Error de Conexion a la base de datos. Esto se trata con excepciones y mensajes amigables <br />";
        }
        
    }
}


