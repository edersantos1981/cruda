<?php

namespace Uargflow;

use Exception;

class Login {

    /**
     * @var \Modelo\Usuario
     */
    protected $usuario;

    /**
     * @var \Mappers\Usuario
     */
    protected $mapper;
    
    /**
     *
     * @return  \Modelo\Usuario
     * @throws  Exception
     * 
     */ 
    public function verificaUsuario($nombreUsuario){
        $this->mapper = new \Mappers\Usuario();
        
        if (!($this->mapper->findbyNombreUsuario($nombreUsuario))) {
            throw new Exception("Nombre de Usuario inexistente");
        }
        return new \Modelo\Usuario($this->mapper->findbyNombreUsuario($nombreUsuario));
    }

    /**
     *
     * @return  bool
     */ 

    /*
    public function verificaPass($pass, $usuario){
        $mapper = new \Mappers\Usuario();
        $objeto = new \Modelo\Usuario();
        return Hash::verificaPasswordHashBD($pass, $objeto->getPassword());
    }
    */

    /**
     *
     * @return  true
     * @throws  Exception
     * 
     */ 
    public function verificaPass($passInput, $passBD) {

        if (!Hash::verificaPasswordHashBD($passInput, $passBD)) {
            throw new Exception("Contrase&ntilde;a inv&aacute;lida.");
        }

        return true;
    }

}