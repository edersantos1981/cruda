<?php 
namespace Modelo;
class UsuarioColeccion extends \Cruda\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Usuario::class);
    }
    
    /**
    * @return Usuario[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}