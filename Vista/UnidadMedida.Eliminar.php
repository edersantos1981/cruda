<?php

include_once '../lib/Constantes.Class.php';

if (!isset($_SERVER["HTTP_REFERER"]) || ($_SERVER["HTTP_REFERER"] != Constantes::APPURL . "/Vista/UnidadMedida.Todo.php")) {
    header("Location: UnidadMedida.Todo.php");
    die();
}

include_once '../vendor/autoload.php';
$Mapper = new \Mappers\UnidadMedida();
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
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Unidades de Medida</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="oi oi-circle-x"> </i> Eliminar Unidad de Medida
                </h5>
            </div>
            <div class="card-body">
                <?php include_once "GuiABM.MensajeEliminar.php" ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="UnidadMedida.Todo.php" class="btn btn-outline-primary">
                        <i class="oi oi-list"> </i> Ir a Panel de Control
                    </a>
                </p>
            </div>
        </div>
    </div>

    <?php include_once '../gui/footer.php'; ?>
</body>

</html>