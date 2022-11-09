<?php 
namespace Modelo;
class RolColeccion extends \Uargflow\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Rol::class);
    }
    
    /**
    * @return Roles[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}