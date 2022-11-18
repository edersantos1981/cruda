<?php include_once __DIR__ . '/../Cruda/Core.Init.php';  ?>
<?php \Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::ABM_GENERAL);?>
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
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-plus"> </i> Agregar Rol
                </h5>
            </div>
            <div class="card-body">
                <form action="Rol.Agregar.Procesar.php" method="post">

                    <?php include_once './Rol.Formulario.php'; ?>

                </form>
            </div>
           
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>