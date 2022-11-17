<?php

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\Subcuenta(); 
$ObjetoCreado = new \Modelo\Subcuenta($_POST); 
$idObjetoEditado = $Mapper->update($ObjetoCreado);

?>
<html>
    <head>
        <?php include_once '../lib/includesCss.php'; ?>
        <?php include_once '../lib/includesJs.php'; ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Subcuentas</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5><i class="oi oi-pencil"> </i> Editar Subcuenta</h5>
                </div>
                <div class="card-body">
                    <?php if ($idObjetoEditado) { ?>
                        <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                        <p>Subcuenta editada correctamente.</p>
                    <?php } ?>
                    <?php if (!$idObjetoEditado) { ?>
                        <p class="alert alert-danger">Hubo un error</p>
                        <p>No fue posible editar la Subcuenta. Por favor, intente nuevamente. Si el problema persiste, contacte el administrador del sistema.</p>
                    <?php } ?>                                        
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
            <div class="row">&nbsp;</div>

        </div>
        <?php include_once "../gui/footer.php"; ?>
    </body>
</html>
