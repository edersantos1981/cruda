<?php

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\Sistema(); 
$ObjetoCreado = new \Modelo\Sistema($_POST); 
$idObjetoEditado = $Mapper->update($ObjetoCreado);

?>
<html>
    <head>
        <?php include_once '../lib/includesCss.php'; ?>
        <?php include_once '../lib/includesJs.php'; ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Sistemas</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5><i class="oi oi-pencil"> </i> Editar Sistema</h5>
                </div>
                <div class="card-body">
                    <?php if ($idObjetoEditado) { ?>
                        <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                        <p>Sistema editado correctamente.</p>
                    <?php } ?>
                    <?php if (!$idObjetoEditado) { ?>
                        <p class="alert alert-danger">Hubo un error</p>
                        <p>No fue posible editar el Sistema. Por favor, intente nuevamente. Si el problema persiste, contacte el administrador del sistema.</p>
                    <?php } ?>                                        
                </div>
                <div class="card-footer">
                    <p>Opciones:</p>
                    <p>
                    <a href="Sistema.Todo.php" class="btn btn-outline-primary">
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
