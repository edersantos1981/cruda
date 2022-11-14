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
        // Autocommit a falso para mantener atomicidad de transaccion
        $this->bdconexion->autocommit(false);
        // Inicia transaccion
        $this->bdconexion->begin_transaction();

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, "
            . "'" . $this->bdconexion->escape_string($Objeto->getNombre_usuario()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "'" . \Uargflow\Hash::creaHash($this->bdconexion->escape_string($Objeto->getPassword())) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getNombre_completo()) . "')";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
            // Si hay error, rollback
            $this->bdconexion->rollback();
        }
        $idUsario = $this->bdconexion->insert_id;
      
        foreach ($Objeto->getRoles() as $rol) {

            $this->query = "INSERT INTO usuario_rol "
                . "VALUES ("
                . $idUsario . ", "
                . $this->bdconexion->escape_string($rol->getId()) . ")";

                $idUsarioROL = $this->bdconexion->insert_id;
                var_dump($idUsarioROL);
                die;
            try {
                $this->ejecutarQuery();
            } catch (\Exception $ex) {
                throw $ex;
                // Si hay error, rollback
                $this->bdconexion->rollback();
            }

        }
        
        // @todo: con el insert_id, recorrer Objeto->getPermisos y hacer INSERT en ROL_PERMISO
        // Al final:
        $this->bdconexion->commit();
        $this->bdconexion->autocommit(true);

        return $idUsario;
    }

    /**
     * @param \modelo\Usuario $Objeto
     */
    public function update($Objeto)
    {
        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET nombre_usuario = '" . $this->bdconexion->escape_string($Objeto->getNombre_usuario()) . "', "
            . "mail = '" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "whatsapp = '" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "nombre_completo = '" . $this->bdconexion->escape_string($Objeto->getNombre_completo()) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return true;
    }

    /**
     * @param \modelo\Usuario $Objeto
     */
    function updatePassword($Objeto)
    {
        $this->bdconexion->autocommit(false);
        $this->bdconexion->begin_transaction();

        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET password = '" . \Uargflow\Hash::creaHash($this->bdconexion->escape_string($Objeto->getPassword())) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            $this->bdconexion->rollback();
            throw $ex;
        }

        $usuario = $this->findById($Objeto->getId());

        $this->query = "INSERT INTO " . \Uargflow\BDConfig::SCHEMA_LOGS . ".usuario_blanqueo "
            . "VALUES (NULL, "
            . $this->bdconexion->escape_string($usuario['id']) . ", "
            . "'" . $this->bdconexion->escape_string($usuario['nombre_usuario']) . "', "
            . "'" . $this->bdconexion->escape_string($usuario['nombre_completo']) . "', "
            . "'" . \Uargflow\IpAddress::get_client_ip() . "', "
            . "NULL, "
            . "NULL )";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            $this->bdconexion->rollback();
            throw $ex;
        }

        $this->bdconexion->commit();
        $this->bdconexion->autocommit(true);

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

    /**
     * @return array
     */
    function findRoles($idUsuario)
    {
        $this->query =
            "SELECT RU.* "
            . "FROM " . \Uargflow\BDConfig::SCHEMA_USUARIOS . ".usuario U, " . \Uargflow\BDConfig::SCHEMA_USUARIOS . ".usuario_rol RU "
            . "WHERE U.id = RU.fk_usuario "
            . "AND RU.fk_usuario = {$idUsuario}";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->resultset->fetch_all(MYSQLI_ASSOC);
    }
}
