<?php

namespace Mappers;

/**
 * Mapper de la clase Usuario
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Usuario extends \Uargflow\BDMapper implements \Uargflow\MapperInterface
{

    function __construct()
    {
        $this->nombreTabla = \Uargflow\BDConfig::SCHEMA_USUARIOS . ".usuario";
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
     * @param \Modelo\Usuario $Objeto
     * @return Int 
     */
    public function insert($Objeto)
    {

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, "
            . "'" . $this->bdconexion->escape_string($Objeto->getNombre()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getPassword()) . "')";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->bdconexion->insert_id;
    }

    /**
     * @param \modelo\Usuario $Objeto
     */
    public function update($Objeto)
    {
        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET nombre = '" . $this->bdconexion->escape_string($Objeto->getNombre()) . "', "
            . "mail = '" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "whatsapp = '" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "password = '" . $this->bdconexion->escape_string($Objeto->getPassword()) . "' "
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
    function findRolById($idRol)
    {
        $MapperRol = new \Mappers\Rol();
        return new \Modelo\Rol($MapperRol->findById($idRol));
    }
}
