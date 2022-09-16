<?php

namespace Uargflow;

Class BDConexion extends \mysqli {
    
    public function __construct() {
        parent::__construct(\Uargflow\BDConfig::HOST, \Uargflow\BDConfig::USUARIO, \Uargflow\BDConfig::PASS, \Uargflow\BDConfig::SCHEMA);   
        if ($this->connect_error) {
            echo "Error de Conexion a la base de datos. Esto se trata con excepciones y mensajes amigables <br />";
        }
        
    }
}


