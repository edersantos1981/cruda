<?php

namespace Mappers;

/**
 * 
 * @author @edersantos1981
 * @author @BracamonteF
 * @author @VictorHValentin
 * 
 */
class Usuario extends \Cruda\BDMapper implements \Cruda\MapperInterface
{

    protected $tablaRoles;

    function __construct()
    {
        $this->nombreAtributoId = "id";
        $this->nombreTabla = \Cruda\BDConfig::SCHEMA_USUARIOS . ".usuario";
        $this->tablaRoles = \Cruda\BDConfig::SCHEMA_USUARIOS . ".usuario_rol";
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

        $this->bdconexion->autocommit(false);
        $this->bdconexion->begin_transaction();

        $this->query = "INSERT INTO {$this->nombreTabla} "
            . "VALUES (NULL, "
            . "'" . strtolower($this->bdconexion->escape_string($Objeto->getNombre_usuario())) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "'" . \Cruda\Hash::creaHash($this->bdconexion->escape_string($Objeto->getPassword())) . "', "
            . "'" . $this->bdconexion->escape_string($Objeto->getNombre_completo()) . "')";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
            $this->bdconexion->rollback();
        }

        $idUsuarioCreado = $this->bdconexion->insert_id;

        foreach ($Objeto->getRoles() as $rol) {

            $this->query = "INSERT INTO {$this->tablaRoles} "
                . "VALUES ( " . $idUsuarioCreado . ", " . $rol->getId() . ", NULL)";
            try {
                $this->ejecutarQuery();
            } catch (\Exception $ex) {
                throw $ex;
                $this->bdconexion->rollback();
            }
        }

        $this->bdconexion->commit();
        $this->bdconexion->autocommit(true);

        return $idUsuarioCreado;
    }

    /**
     * @param \modelo\Usuario $Objeto
     */
    public function update($Objeto)
    {

        $this->bdconexion->autocommit(false);
        $this->bdconexion->begin_transaction();

        //Actualiza datos en tabla usuario
        $this->query = "UPDATE {$this->nombreTabla} "
            . "SET nombre_usuario = '" . strtolower($this->bdconexion->escape_string($Objeto->getNombre_usuario())) . "', "
            . "mail = '" . $this->bdconexion->escape_string($Objeto->getMail()) . "', "
            . "whatsapp = '" . $this->bdconexion->escape_string($Objeto->getWhatsapp()) . "', "
            . "nombre_completo = '" . $this->bdconexion->escape_string($Objeto->getNombre_completo()) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
            $this->bdconexion->rollback();
        }

        //devuelve los roles actualmente asociados al usuario
        $this->query = "SELECT * FROM {$this->tablaRoles} "
            . "WHERE fk_usuario = " . $Objeto->getId();

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            $this->bdconexion->rollback();
            throw $ex;
        }
        $rolesActuales =  $this->resultset->fetch_all(MYSQLI_ASSOC);

        // Elimina los roles actuales que no coinciden con los nuevos
        foreach ($rolesActuales as $rolActual) {
            $borrar = true;
            foreach ($Objeto->getRoles() as $rol) {
                if ($rolActual["fk_rol"] == $rol->getId()) {
                    $borrar = false;
                }
            }
            if ($borrar) {
                //Registra en log el rol borrado
                $this->query = "INSERT INTO "
                    . \Cruda\BDConfig::SCHEMA_LOGS . ".usuario_alta_baja_rol "
                    . "VALUES (NULL, "
                    . $Objeto->getId() . ", "
                    . $rolActual["fk_rol"] . ", '"
                    . $rolActual["fecha_desde"] . "', "
                    . "NULL, '"
                    . \Cruda\IpAddress::get_client_ip()
                    . "', NULL)";

                try {
                    $this->ejecutarQuery();
                } catch (\Exception $ex) {

                    $this->bdconexion->rollback();
                    throw $ex;
                }

                //Borrado de datos preexistentes en tabla usuario_rol
                $this->query = "DELETE FROM {$this->tablaRoles} "
                    . "WHERE fk_rol = " . $rolActual["fk_rol"];

                try {
                    $this->ejecutarQuery();
                } catch (\Exception $ex) {

                    $this->bdconexion->rollback();
                    throw $ex;
                }
            }
        }


        // Carga de nuevos datos en tabla usuario_rol
        foreach ($Objeto->getRoles() as $rol) {

            $this->query = "INSERT IGNORE INTO {$this->tablaRoles} "
                . "VALUES ( " . $Objeto->getId() . ", " . $rol->getId() . ", NULL)";
            try {
                $this->ejecutarQuery();
            } catch (\Exception $ex) {

                $this->bdconexion->rollback();
                throw $ex;
            }
        }

        $this->bdconexion->commit();
        $this->bdconexion->autocommit(true);

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
            . "SET password = '" . \Cruda\Hash::creaHash($this->bdconexion->escape_string($Objeto->getPassword())) . "' "
            . "WHERE {$this->nombreAtributoId} = {$Objeto->getId()}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            $this->bdconexion->rollback();
            throw $ex;
        }

        $usuario = $this->findById($Objeto->getId());

        $this->query = "INSERT INTO " . \Cruda\BDConfig::SCHEMA_LOGS . ".usuario_blanqueo "
            . "VALUES (NULL, "
            . $this->bdconexion->escape_string($usuario['id']) . ", "
            . "NULL, "
            . "'" . \Cruda\IpAddress::get_client_ip() . "', "
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
            . "FROM " . \Cruda\BDConfig::SCHEMA_USUARIOS . ".usuario U, " . \Cruda\BDConfig::SCHEMA_USUARIOS . ".usuario_rol RU "
            . "WHERE U.id = RU.fk_usuario "
            . "AND RU.fk_usuario = {$idUsuario}";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->resultset->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @return array
     */
    function findPermisosJSON($idUsuario)
    {

        $this->query =
            "SELECT fk_permiso "
            . "FROM " . \Cruda\BDConfig::SCHEMA_USUARIOS . ".usuario_rol UR, "
            . \Cruda\BDConfig::SCHEMA_USUARIOS . ".rol_permiso RP "
            . "WHERE UR.fk_rol = RP.fk_rol "
            . "AND UR.fk_usuario = {$idUsuario}";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        while ($row = $this->resultset->fetch_assoc()) {
            $arrayResultado[] = $row["fk_permiso"];
        }
        return json_encode($arrayResultado);
    }


    /**
     * @return array Array asociativo
     */
    function findbyNombreUsuario($nombreUsuario)
    {
        $nombreUsusairolc = strtolower($nombreUsuario);
        $this->query =
            "SELECT * "
            . "FROM {$this->nombreTabla} "
            . "WHERE nombre_usuario = '{$nombreUsusairolc}'";
        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->resultset->fetch_assoc();
    }

    function registrarLogin($nombreUsuario, $loginStatus)
    {
        $this->query = "INSERT INTO " . \Cruda\BDConfig::SCHEMA_LOGS . ".usuario_login "
            . "VALUES (NULL, "
            . "'" . $this->bdconexion->escape_string($nombreUsuario) . "', "
            . "NULL, "
            . "'" . \Cruda\IpAddress::get_client_ip() . "', "
            . "'" . $loginStatus . "' )";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        $idLoginUsuarioCreado = $this->bdconexion->insert_id;

        return $idLoginUsuarioCreado;;
    }
}
