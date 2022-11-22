<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 
\Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::ABM_GENERAL);

$Mapper = new \Mappers\Rol();
$ObjetoCreado = new \Modelo\Rol($Mapper->findById($_GET['id']));

if(isset($ObjetoCreado)){
    $ArrayFindPermisosRol = $Mapper->findPermisos($ObjetoCreado->getId());
}

?>
<html>
    <head>
        <?php include_once '../lib/includesCss.php'; ?>
        <?php include_once '../lib/includesJs.php'; ?>
        <?php include_once '../lib/includeComboboxJQueryUI.php' ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Roles</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Editar Rol
                </h5>
                </div>
                <div class="card-body">
                    <form action="Rol.Editar.Procesar.php" method="post">
                            <?php include_once 'Rol.Formulario.php'; ?>
                    </form>
                </div>
            </div>   
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>