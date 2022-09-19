<?php

namespace Mappers;

/**
 * Mapper de la clase Cuenta
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Cuenta extends \Uargflow\BDMapper implements \Uargflow\MapperInterface
{

    function __construct()
    {
        $this->nombreTabla = "cuenta";
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
     * @param \Modelo\Cuenta $Objeto
     * @return Int 
     */
    public function insert($Objeto)
    {

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, '"
            . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "')";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->bdconexion->insert_id;
    }

    /**
     * @param \modelo\Subcuenta $Objeto
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
}
