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
    <div class="jumbotron jumbo-pic text-white">
        <h1 class="jumbotron-titulo">¡Hola, Valeria!</h1>
        <h3 class="jumbotron-subtitulo lead">¿A qu&eacute; sistema deseas ingresar?</h3>
        <div>
            <img class="logo-santacruz" src="../lib/img/logo_santacruz.png">
        </div>
        <div>
            <img class="logo-vialidad" src="../lib/img/logo_vialidad.png">
        </div>
    </div>
    

    <!-- </div> -->

    <?php include './index.jumbo.php' ?>
    <br />
    <?php include_once __DIR__ . '/../gui/footer.php'; ?>
</body>
</html>