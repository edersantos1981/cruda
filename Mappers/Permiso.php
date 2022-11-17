<?php

namespace Mappers;

/**
 * Mapper de la clase Permiso
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Permiso extends \Cruda\BDMapper implements \Cruda\MapperInterface
{

    function __construct()
    {
        $this->nombreTabla = \Cruda\BDConfig::SCHEMA_USUARIOS . ".permiso";
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
     * @param \Modelo\Permiso $Objeto
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
     * @param \modelo\Permiso $Objeto
     */
    public function update($Objeto)
    {
        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET descripcion = '" . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return true;
    }

    /**
     * @return Sistema 
     */
    function findSistemaById($idSistema)
    {
        $MapperSistema = new \Mappers\Sistema();
        return new \Modelo\Sistema($MapperSistema->findById($idSistema));
    }

    /**
     * @return array
     */
    function findPermisosbySistema($idSistema)
    {
        $this->query = 
            "SELECT * "
            . "FROM "  . \Cruda\BDConfig::SCHEMA_USUARIOS .  ".permiso "
            . "WHERE fk_sistema = $idSistema ";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }
        return $this->resultset->fetch_all(MYSQLI_ASSOC);
    }
}
