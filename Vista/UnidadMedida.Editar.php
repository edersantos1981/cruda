<?php

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\UnidadMedida();
$ObjetoCreado = new \Modelo\UnidadMedida($Mapper->findById($_GET['id']));
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
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Editar Unidad de Medida
                </h5>
                </div>
                <div class="card-body">
                    <form action="UnidadMedida.Editar.Procesar.php" method="post">
                            <?php include_once 'UnidadMedida.Formulario.php'; ?>
                    </form>
                </div>
            </div>   
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>