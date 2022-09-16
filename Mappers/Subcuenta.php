<?php

namespace Mappers;

/**
 * Mapper de la clase Subcuenta
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Subcuenta extends \Uargflow\BDMapper implements \Uargflow\MapperInterface
{

    function __construct()
    {
        $this->nombreTabla = "subcuenta";
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
     * @param \Modelo\Subcuenta $Objeto
     * @return Int 
     */
    public function insert($Objeto)
    {

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, "
            . $this->bdconexion->escape_string($Objeto->getFk_cuenta()) . " , '"
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
            . "SET fk_cuenta = {$this->bdconexion->escape_string($Objeto->getFk_cuenta())} , "
            . "descripcion = '{$this->bdconexion->escape_string($Objeto->getDescripcion())}' "
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
    function findCuentaById($idCuenta){
        $MapperCuenta = new \Mappers\Cuenta();
        return $MapperCuenta->findById($idCuenta);
    }

    
}
