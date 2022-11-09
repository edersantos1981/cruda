<?php 
namespace Modelo;
class UsuarioColeccion extends \Uargflow\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Usuario::class);
    }
    
    /**
    * @return Usarios[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}