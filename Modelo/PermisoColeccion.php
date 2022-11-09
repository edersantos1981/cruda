<?php 
namespace Modelo;
class PermisoColeccion extends \Uargflow\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Permiso::class);
    }
    
    /**
    * @return Permisos[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}