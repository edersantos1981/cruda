<?php

namespace Mappers;

class UnidadMedidaAjax
{

    // DB table to use
    protected $table, $primaryKey, $sql_details, $columns;


    function __construct()
    {


        // Table's primary key
        $this->primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes



        // SQL server connection information
        $this->sql_details = array(
            'user' => \Uargflow\BDConfig::USUARIO,
            'pass' => \Uargflow\BDConfig::PASS,
            'db'   => \Uargflow\BDConfig::SCHEMA,
        );

        $this->columns = array(
            array('db' => 'descripcion',  'dt' => 0),
            array(
                'db' => 'id',
                'dt' => 1,
                'formatter' => function ($d) {
                    return '<a name="" id="" class="btn btn-outline-warning" href="UnidadMedida.Editar.php?id=' . $d . '" role="button"><i class="oi oi-pencil"> </i> Editar</a>
                <a name="" id="" class="btn btn-outline-danger" href="UnidadMedida.Eliminar.php?id=' . $d . '" role="button" data-toggle="modal" data-target="#exampleModalCenter" onClick="cambiaHrefBottonEliminar(' . $d . ');"><i class="oi oi-circle-x">
                    </i>
                    Eliminar</a>';
                }
            )
        );


        $this->table = 'unidad_medida';
    }


    /**
     * Get the value of table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get the value of primaryKey
     */ 
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * Get the value of columns
     */ 
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get the value of sql_details
     */ 
    public function getSqlDetails()
    {
        return $this->sql_details;
    }
}
