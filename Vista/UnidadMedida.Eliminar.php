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
                <?php if ($ObjetoEliminado) { ?>
                    <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                    <p>Se ha eliminado correctamente.</p>
                <?php
                } ?>
                <?php if (!$ObjetoEliminado) { ?>
                    <p class="alert alert-danger">Hubo un error</p>
                    <p>No fue posible eliminar. Por favor, intente nuevamente. </p>
                    <p>Si el problema persiste, contacte el administrador del sistema.</p>
                    <small>C&oacute;digo de referencia: <b><?= $th->getCode() ?></b></small>
                <?php
                } ?>
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