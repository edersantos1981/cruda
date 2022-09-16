<?php

use function PHPSTORM_META\type;

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

if (count($_POST) > 0) {

    $ObjetoCreado = new \Modelo\UnidadMedida($_POST);
    $Mapper = new \Mappers\UnidadMedida();

    try {
        $idObjetoCreado = $Mapper->insert($ObjetoCreado);
    }
    catch (\Exception $th) {
        $idObjetoCreado = null;
    }

}
?>

<?php
session_start();
include_once '../vendor/autoload.php';
include_once '../lib/Constantes.Class.php';
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <title>
        <?= Constantes::NOMBRE_SISTEMA; ?> Agregar Elemento
    </title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-plus"> </i> Agregar elemento
                </h5>
            </div>
            <div class="card-body">

                <?php
                /* Escenario 1: Se cargó exitosamente. */
                if (is_int($idObjetoCreado)) {
                ?>
                    <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                    <p>Los datos fueron cargados correctamente.</p>
                <?php } ?>

                <?php
                /*  Escenario 2: Error capturado por excepción.  */
                if (!$idObjetoCreado) {
                ?>
                    <p class="alert alert-danger">Hubo un error</p>
                    <p>No fue posible cargar los datos en el sistema. Por favor, intente nuevamente. Si el problema persiste, contacte el administrador del sistema.</p>
                    <small>C&oacute;digo de referencia: <?= $th->getCode() ?></small>
                <?php } ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="UnidadMedida.Agregar.php" class="btn btn-outline-success">
                        <i class="oi oi-plus"> </i> Agregar otro elemento
                    </a>
                    <a href="UnidadMedida.Todo.php" class="btn btn-outline-primary">
                        <i class="oi oi-list"> </i> Ir a Panel de Control
                    </a>
                </p>
            </div>
        </div>
        <div class="row">&nbsp;</div>
    </div>

    <?php include_once '../gui/footer.php'; ?>
</body>

</html>

