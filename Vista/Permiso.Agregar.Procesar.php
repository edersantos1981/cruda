<?php
include_once __DIR__ . '/../Cruda/Core.Init.php'; 
\Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::ABM_GENERAL); 

if (count($_POST) > 0) {
    
    $ObjetoCreado = new \Modelo\Permiso($_POST);
    $Mapper = new \Mappers\Permiso();
    

    try {
       
        $_SESSION[\Cruda\Constantes::ID_SISTEMA]['idObjetoPRG'] = $Mapper->insert($ObjetoCreado);
    }
    catch (\Exception $th) {
        $_SESSION[\Cruda\Constantes::ID_SISTEMA]['idObjetoPRG'] = \Cruda\BDMapper::PRG_ERROR;
        $Error = $th->getCode();
    }

    header("HTTP/1.1 303 See Other");
    header("Location: " . \Cruda\Constantes::APPURL . "/Vista/GuiABM.PRGAgregar.php?modelo=Permiso");
    die();
}
?>

