<?php 
namespace Modelo;
class SistemaColeccion extends \Uargflow\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Sistema::class);
    }
    
    /**
    * @return Sistemas[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}