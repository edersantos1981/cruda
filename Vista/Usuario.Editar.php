<?php

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\Usuario();
$ObjetoCreado = new \Modelo\Usuario($Mapper->findById($_GET['id']));
?>
<html>
    <head>
        <?php include_once '../lib/includesCss.php'; ?>
        <?php include_once '../lib/includesJs.php'; ?>
        <?php include_once '../lib/includeComboboxJQueryUI.php' ?>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Usarios</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Editar Usuario
                </h5>
                </div>
                <div class="card-body">
                    <form action="Usuario.Editar.Procesar.php" method="post">
                            <?php include_once 'Usario.Formulario.php'; ?>
                    </form>
                </div>
            </div>   
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>