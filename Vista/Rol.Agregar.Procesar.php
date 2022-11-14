<?php
session_start();

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

if (count($_POST) > 0) {

    $ObjetoCreado = new \Modelo\Rol($_POST);

    // Obtiene los permisos del POST
    foreach ($_POST['permiso'] as $idPermiso => $foo) {
        $Permisos[] = new \Modelo\Permiso(array("id" => $idPermiso));
    }
    $ObjetoCreado->setPermisos($Permisos);

    // Trash, eliminar dump die.
    var_dump($Permisos);
    die();

    $Mapper = new \Mappers\Rol();

    try {
        $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] = $Mapper->insert($ObjetoCreado);
    } catch (\Exception $th) {
        $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] = \Uargflow\BDMapper::PRG_ERROR;
        $Error = $th->getCode();
    }

    header("HTTP/1.1 303 See Other");
    header("Location: " . Constantes::APPURL . "/Vista/GuiABM.PRGAgregar.php?modelo=Rol");
    die();
}
