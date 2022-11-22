<?php
include_once __DIR__ . '/../Cruda/Core.Init.php'; 

if (count($_POST) > 0) {

    $ObjetoCreado = new \Modelo\UnidadMedida($_POST);
    $Mapper = new \Mappers\UnidadMedida();

    try {
        $_SESSION[\Cruda\Constantes::ID_SISTEMA]['idObjetoPRG'] = $Mapper->insert($ObjetoCreado);
    }
    catch (\Exception $th) {
        $_SESSION[\Cruda\Constantes::ID_SISTEMA]['idObjetoPRG'] = \Cruda\BDMapper::PRG_ERROR;
        $Error = $th->getCode();
    }

    header("HTTP/1.1 303 See Other");
    header("Location: " . \Cruda\Constantes::APPURL . "/Vista/GuiABM.PRGAgregar.php?modelo=UnidadMedida");
    die();
}
?>

