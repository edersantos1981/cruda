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
                /*  Escenario 1: Ya fue cargado anteriormente (Refresh). No vuelve a cargar.  */
                if ($_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] == \Uargflow\BDMapper::PRG_OK) {
                ?>

                    <p class="alert alert-warning">Hubo un error</p>
                    <p>No es posible cargar dos veces el mismo elemento. Esto puede suceder por una actualizaci&oacute;n de
                        p&aacute;gina.</p>

                <?php
                } ?>

                <?php
                /* Escenario 2: Se cargó exitosamente. Se carga flag PRG_OK en sesion. */
                if (is_int($_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG']) && $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] >= 0) {
                    $_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] = \Uargflow\BDMapper::PRG_OK;
                ?>

                    <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                    <p>Los datos fueron cargados correctamente.</p>

                <?php

                } ?>



                <?php
                /*  Escenario 3: Error capturado por excepción.  */
                if ($_SESSION[Constantes::ID_SISTEMA]['idObjetoPRG'] == \Uargflow\BDMapper::PRG_ERROR) {
                ?>

                    <p class="alert alert-danger">Hubo un error</p>
                    <p>No fue posible cargar los datos en el sistema. Por favor, intente nuevamente. Si el problema
                        persiste, contacte el administrador del sistema.</p>


                <?php

                } ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="<?= $_GET['modelo']; ?>.Agregar.php" class="btn btn-outline-success">
                        <i class="oi oi-plus"> </i> Agregar otro elemento
                    </a>
                    <a href="<?= $_GET['modelo']; ?>.Todo.php" class="btn btn-outline-primary">
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