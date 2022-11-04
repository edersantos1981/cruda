<?php include_once __DIR__ . '/../vendor/autoload.php'; ?>

<html>
<head>
    <?php include_once __DIR__ . '/../lib/includesCss.php'; ?>
    <?php include_once __DIR__ . '/../lib/includesJs.php'; ?>
    <?php include_once __DIR__ . '/../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Portada</title>
</head>

<body>
    <?php include_once __DIR__ . '/../gui/navbar.php'; ?>
    <div class="jumbotron bg-warning">
        <h3 class="display-4"><i class="bi-check-square"></i> <?= Constantes::NOMBRE_SISTEMA ?></h3>
        <p class="lead">Hola, Valeria!</p>
        <p class="lead">Ingrese al sistema que desea a continuaci&oacute;n.</p>
    </div>
    <?php include './index.jumbo.php' ?>
    <br />
    <?php include_once __DIR__ . '/../gui/footer.php'; ?>
</body>
</html>