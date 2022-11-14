<?php

namespace Uargflow;

class Login {
    
    /**
     *
     * @return  bool
     */ 
    public function verificaUsuario($usuario){
        $mapper = new \Mappers\Usuario();
        return(!empty($mapper->findbyNombreUsuario($usuario)));
    }

    /**
     *
     * @return  bool
     */ 
    public function verificaPass($pass, $usuario){
        $mapper = new \Mappers\Usuario();
        $objeto = new \Modelo\Usuario($mapper->findbyNombreUsuario($usuario));
        return Hash::verificaPasswordHashBD($pass, $objeto->getPassword());
    }
}
?>