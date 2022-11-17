<?php 
namespace Modelo;
class PermisoColeccion extends \Cruda\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Permiso::class);
    }
    
    /**
    * @return Permiso[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}