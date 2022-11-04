<?php
include_once '../vendor/autoload.php';
?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Portada</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="jumbotron bg-warning">
        <h3 class="display-4"><i class="bi-check-square"></i> <?= Constantes::NOMBRE_SISTEMA ?></h3>
        <p class="lead">Hola, Valeria!</p>
        <p class="lead">Ingrese al sistema que desea a continuaci&oacute;n.</p>
    </div>



    <!-- </div> -->

    <?php include './index.jumbo.php' ?>
    <br />
    <?php include_once '../gui/footer.php'; ?>
</body>

</html>