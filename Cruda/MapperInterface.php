<?php

namespace Cruda;

/**
 * Interfaz para objetos Data Mapper.
 * 
 * @author esantos
 * @example \Mappers\Permiso Ejemplo de implementación
 * 
 * 
 */
interface MapperInterface {

    public function findAll($filtrosBusqueda = null);

    /**
     * 
     * @param Int $id
     */
    public function findById($id);

    /**
     * @param \stdClass $Objeto
     * @return Int Devuelve el id del objeto creado en el datastorage
     */
    public function insert($Objeto);

    /**
     * 
     * @param \stdClass $Objeto
     * @return Boolean TRUE si exitoso o Excepción
     * 
     */
    public function update($Objeto);

    /**
     * 
     * @param Int $idObjeto
     * @return Boolean TRUE si exitoso o Excepción
     */
    public function delete($idObjeto);
}
