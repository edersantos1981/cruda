<?php

include_once __DIR__ . '/../Cruda/Constantes.php';

if (!isset($_SERVER["HTTP_REFERER"]) || ($_SERVER["HTTP_REFERER"] != \Cruda\Constantes::APPURL . "/Vista/Cuenta.Todo.php")) {
    header("Location: Cuenta.Todo.php");
    die();
}

include_once __DIR__ . '/../Cruda/Core.Init.php'; 


$Mapper = new \Mappers\Cuenta();
try {
    $ObjetoEliminado = $Mapper->delete($_GET['id']);
} catch (\Exception $th) {
    //1451
    $ObjetoEliminado = false;
}


?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Cuentas</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="oi oi-circle-x"> </i> Eliminar Cuenta
                </h5>
            </div>
            <div class="card-body">
                <?php include_once "GuiABM.MensajeEliminar.php" ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="Cuenta.Todo.php" class="btn btn-outline-primary">
                        <i class="oi oi-list"> </i> Ir a Panel de Control
                    </a>
                </p>
            </div>
        </div>
    </div>

    <?php include_once '../gui/footer.php'; ?>
</body>

</html>