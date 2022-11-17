<?php include_once __DIR__ . '/../Cruda/Core.Init.php';  ?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Cuentas</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-plus"> </i> Agregar Cuenta
                </h5>
            </div>
            <div class="card-body">
                <form action="Cuenta.Agregar.Procesar.php" method="post">

                    <?php include_once './Cuenta.Formulario.php'; ?>

                </form>
            </div>
           
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>