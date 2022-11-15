<?php include_once __DIR__ . '/../Uargflow/Core.Init.php'; ?>
<html>

<head>
    <?php include_once __DIR__ . '/../lib/includesCss.php'; ?>
    <?php include_once __DIR__ . '/../lib/includesJs.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Portada</title>
</head>

<body>
    <?php include_once __DIR__ . '/../gui/navbar.php'; ?>
    <div class="jumbotron jumbo-pic text-white">
        <h1 class="jumbotron-titulo">¡Hola, <?php echo $_SESSION['nombre_usuario'] ?>!</h1>
        <h3 class="jumbotron-subtitulo lead">¿A qu&eacute; sistema deseas ingresar?</h3>
        <div>
            <img class="logo-santacruz" src="../lib/img/logo_santacruz.png">
        </div>
        <div>
            <img class="logo-vialidad" src="../lib/img/logo_vialidad.png">
        </div>
    </div>
    <?php include './menu.jumbo.php' ?>
    <br />
    <?php include_once __DIR__ . '/../gui/footer.php'; ?>
</body>

</html>