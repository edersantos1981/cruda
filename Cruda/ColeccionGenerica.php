<?php

namespace Cruda;

class ColeccionGenerica {

	protected $coleccion;
	
	function __construct($array, $clase = StdClass::class) {
		foreach($array as $elementoDelArray) {
			$this->coleccion[] = new $clase($elementoDelArray);
		}
	}
	
	
    /**
    * @return \StdClass[]
    */
	function getColeccion() {
	    	return $this->coleccion;
	}
	
}
