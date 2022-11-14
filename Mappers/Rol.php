<?php

namespace Mappers;

/**
 * Mapper de la clase Rol
 * @author Eder dos Santos - esantos@uarg.unpa.edu.ar
 */
class Rol extends \Uargflow\BDMapper implements \Uargflow\MapperInterface
{

    protected $tablaPermisos;

    function __construct()
    {
        $this->nombreAtributoId = "id";
        $this->nombreTabla = \Uargflow\BDConfig::SCHEMA_USUARIOS . ".rol";
        $this->tablaPermisos = \Uargflow\BDConfig::SCHEMA_USUARIOS . ".rol_permiso";
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

        // Autocommit a falso para mantener atomicidad de transaccion
        $this->bdconexion->autocommit(false);
        // Inicia transaccion
        $this->bdconexion->begin_transaction();

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, '"
            . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "', "
            . $this->bdconexion->escape_string($Objeto->getFk_sistema()) . ")";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
            // Si hay error, rollback
            $this->bdconexion->rollback();
        }

        $idRolCreado = $this->bdconexion->insert_id;

        foreach($Objeto->getPermisos() as $permiso) {

            $this->query = "INSERT INTO {$this->tablaPermisos} "
            . "VALUES ( " . $idRolCreado . ", " . $permiso->getId() . " )";

            try {
                $this->ejecutarQuery();
            } catch (\Exception $ex) {
                throw $ex;
                $this->bdconexion->rollback();
            }
            
        }

        // @todo: con el insert_id, recorrer Objeto->getPermisos y hacer INSERT en ROL_PERMISO
        // Al final:
        $this->bdconexion->commit();
        $this->bdconexion->autocommit(true);

        return $idRolCreado;

    }

    /**
     * @param \modelo\Rol $Objeto
     */
    public function update($Objeto)
    {

        $this->bdconexion->autocommit(false);
        $this->bdconexion->begin_transaction();

        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET descripcion = '" . $this->bdconexion->escape_string($Objeto->getDescripcion()) . "', "
            . "fk_sistema = '" . $this->bdconexion->escape_string($Objeto->getFk_sistema()) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        $this->query = "DELETE FROM {$this->tablaPermisos} "
        . "WHERE fk_rol = " . $Objeto->getId();

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
            // Si hay error, rollback
            $this->bdconexion->rollback();
        }

        // Carga de nuevos datos en tabla usuario_rl
        foreach ($Objeto->getPermisos() as $permiso) {

            $this->query = "INSERT INTO {$this->tablaPermisos} "
                . "VALUES ( " . $Objeto->getId() . ", " . $permiso->getId() . ")";
            try {
                $this->ejecutarQuery();
            
            } catch (\Exception $ex) {
                throw $ex;
                // Si hay error, rollback
                $this->bdconexion->rollback();
            }
           
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
