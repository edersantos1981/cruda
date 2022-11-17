<?php

include_once '../lib/Constantes.Class.php';

if (!isset($_SERVER["HTTP_REFERER"]) || ($_SERVER["HTTP_REFERER"] != \Cruda\Constantes::APPURL . "/Vista/Subcuenta.Todo.php")) {
    header("Location: Subcuenta.Todo.php");
    die();
}

include_once '../vendor/autoload.php';
$Mapper = new \Mappers\Subcuenta();
try {
    $ObjetoEliminado = $Mapper->delete($_GET['id']);
} catch (\Exception $th) {
    echo $th->getMessage();
}


?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - SubCuentas</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="oi oi-circle-x"> </i> Eliminar Subcuenta
                </h5>
            </div>
            <div class="card-body">
                <?php include_once "GuiABM.MensajeEliminar.php" ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="Subcuenta.Todo.php" class="btn btn-outline-primary">
                        <i class="oi oi-list"> </i> Ir a Panel de Control
                    </a>
                </p>
            </div>
        </div>
    </div>

    <?php include_once '../gui/footer.php'; ?>
</body>

</html>