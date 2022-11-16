<?php

namespace Cruda;

/**
 * Esta clase contiene los atributos genéricos de cualquier tabla de la base de datos (id, nombre), así como el método genérico para asociar los valores de un array hacia atributos de un objeto.
 * Así, las clases de modelo deben extender de esta clase.
 *
 * @author Eder dos Santos <esantos@uarg.unpa.edu.ar>
 */
class ModeloGenerico
{

    protected $id;
    protected $nombre;
    protected $descripcion;

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * 
     * Asigna los atributos de un array asociativo a los atributo del objeto, a partir del nombre de cada atributo.
     * 
     * @param Array $arrayDatos
     * @throws \Exception
     */
    protected function mapeoAtributosArray($arrayDatos)
    {
        if (!$arrayDatos) {
            throw new \Exception("Datos Invalidos");
        }

        foreach ($arrayDatos as $atributo => $valor) {
            if (property_exists($this, $atributo)) {
                $this->{$atributo} = $valor;
            }
        }
    }

    public function __construct($arrayDatos = null)
    {

        if ((func_num_args() === 0)) {
            throw new \Exception("ERROR. Objeto sin parámetros.", 100);
        }

        if (!is_array($arrayDatos)) {
            throw new \Exception("ERROR. Array de datos vacío.", 101);
        }

        try {
            $this->mapeoAtributosArray($arrayDatos);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}