<?php 

include_once __DIR__ . '/../Cruda/Core.Init.php';  
\Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::ABM_GENERAL); 

?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
        <?php include_once '../lib/includeComboboxJQueryUI.php' ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Permisos</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-plus"> </i> Agregar Permiso
                </h5>
            </div>
            <div class="card-body">
                <form action="Permiso.Agregar.Procesar.php" method="post">

                    <?php include_once './Permiso.Formulario.php'; ?>

                </form>
            </div>
           
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>