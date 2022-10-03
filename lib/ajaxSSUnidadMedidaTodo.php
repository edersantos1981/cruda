<?php
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\UnidadMedidaAjax();
 
echo json_encode(
    \Uargflow\SSP::simple( $_GET, $Mapper->getSqlDetails(), $Mapper->getTable(), $Mapper->getPrimaryKey(), $Mapper->getColumns() )
);