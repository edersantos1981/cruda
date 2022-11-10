<?php

namespace Uargflow;

class BDMapper implements \Uargflow\MapperInterface {

    const PRG_OK = -1;
    const PRG_ERROR = "Error";

    /** @var String * */
    protected $query;

    /** @var Int Description * */
    protected $id;

    /** @var String * */
    protected $nombreTabla;

    /** @var String * */
    protected $nombreAtributoId;

    /** @var StdClass[] */
    protected $coleccion;

    /**
     *
     * @var BDconexion
     */
    protected $bdconexion;

    function __construct() {
        $this->bdconexion = new BDConexion();
    }

    /**
     *
     * @var \mysqli_result
     */
    protected $resultset;

    function getNombreTabla() {
        return $this->nombreTabla;
    }

    function getNombreAtributoId() {
        return $this->nombreAtributoId;
    }

    function setNombreTabla($nombreTabla) {
        $this->nombreTabla = $nombreTabla;
    }

    function setNombreAtributoId($nombreAtributoId) {
        $this->nombreAtributoId = $nombreAtributoId;
    }

    /**
     * 
     * @throws Exception en caso de error. No en caso de resultados vacios.
     */
    function ejecutarQuery() {
        $this->resultset = $this->bdconexion->query($this->query);

        if(!$this->resultset) {
            throw new \Exception($this->bdconexion->error, $this->bdconexion->errno);
        }
    }

    /**
     * @todo Implementar filtros WHERE, LIMIT, ETC. ETC. ETC.
     * @param Array $filtrosBusqueda
     * @return array Array asociativo con los registros de la BD. 
     * Cada elemento del array es una fila.
     * Este método NO debe devolver un array de objetos instanciados por definición del design pattern.
     */
    public function findAll($filtrosBusqueda = null) {

        $this->query = "SELECT * FROM " . $this->nombreTabla;
        $this->resultset = $this->bdconexion->query($this->query);
        if(!$this->resultset){
            throw New \Exception($this->bdconexion->error, $this->bdconexion->errno);
        }

        return $this->resultset->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * 
     * @param int $id
     * @return array Array asociativo con el registro de la BD. 
     * Cada elemento del array es un campo de la tabla / vista.
     * El método NO debe instanciar el objeto por definición del design pattern.
     */
    function findById($id) {

        $this->query = "SELECT * FROM " . $this->nombreTabla . " WHERE " . $this->nombreAtributoId . "=" . $id;
        $this->resultset = $this->bdconexion->query($this->query);

        if(!$this->resultset){
            throw New \Exception($this->bdconexion->error, $this->bdconexion->errno);
        }

        return $this->resultset->fetch_assoc();
    }

    /**
     * 
     * @param Int $idObjeto id del Objeto en la tabla de la BD
     * @return boolean
     * @throws Exception
     * 
     */
    function delete($idObjeto) {
        $this->query = "DELETE FROM {$this->nombreTabla} "
                . "WHERE {$this->nombreAtributoId} = {$idObjeto}";

        try {
            $this->ejecutarQuery();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return true;
    }

    /**
     * 
     * @param \stdClass $Objeto
     * Implementación ad-hoc por Clase
     * 
     */
    public function insert($Objeto) {
        ;
    }

    /**
     * 
     * @param \stdClass $Objeto
     * Implementación ad-hoc por Clase
     * 
     */
    public function update($Objeto) {
        ;
    }

}
