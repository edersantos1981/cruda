<?php
session_start();

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

if (count($_POST) > 0) {

    $ObjetoCreado = new \Modelo\Usuario($_POST);
    foreach ($_POST['rol'] as $idRol => $foo) {
        $Roles[] = new \Modelo\Rol(array("id" => $idRol));
    }
    $ObjetoCreado->setRoles($Roles);

    $Mapper = new \Mappers\Usuario();



    try {

        $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] = $Mapper->insert($ObjetoCreado);
    } catch (\Exception $th) {
        $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] = \Cruda\BDMapper::PRG_ERROR;
        $Error = $th->getCode();
    }

    header("HTTP/1.1 303 See Other");
    header("Location: " . Constantes::APPURL . "/Vista/GuiABM.PRGAgregar.php?modelo=Usuario");
    die();
}
