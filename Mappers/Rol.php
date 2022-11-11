<?php

namespace Mappers;

/**
 * Mapper de la clase Rol
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Rol extends \Uargflow\BDMapper implements \Uargflow\MapperInterface
{

    function __construct()
    {
        $this->nombreTabla = \Uargflow\BDConfig::SCHEMA_USUARIOS . ".rol";
        $this->nombreAtributoId = "id";
        parent::__construct();
    }

    public function findAll($filtrosBusqueda = null)
    {
        return parent::findAll($filtrosBusqueda);
    }

    public function findById($id)
    {
        return parent::findById($id);
    }

    public function delete($idObjeto)
    {
        return parent::delete($idObjeto);
    }

    /**
     * 
     * @param \Modelo\Rol $Objeto
     * @return Int 
     */
    public function insert($Objeto)
    {

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, '"
            . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "', "
            . $this->bdconexion->escape_string($Objeto->getFk_sistema()) . ")";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->bdconexion->insert_id;
    }

    /**
     * @param \modelo\Rol $Objeto
     */
    public function update($Objeto)
    {
        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET descripcion = '" . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "', "
            . "fk_sistema = '" . $this->bdconexion->escape_string($Objeto->getFk_sistema()) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return true;
    }

    /**
     * @return array 
     */
    function findSistemaById($idSistema)
    {
        $MapperSistema = new \Mappers\Sistema();
        return new \Modelo\Sistema($MapperSistema->findById($idSistema));        
    }

    /**
     * @return array
     */
    function findPermisos($idRol)
    {
        $this->query = 
            "SELECT P.* "
            . "FROM " . \Uargflow\BDConfig::SCHEMA_USUARIOS . ".permiso P, " . \Uargflow\BDConfig::SCHEMA_USUARIOS . ".rol_permiso RP "
            . "WHERE P.id = RP.fk_permiso "
            . "AND RP.fk_rol = {$idRol}";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->resultset->fetch_all(MYSQLI_ASSOC);
    }
}
