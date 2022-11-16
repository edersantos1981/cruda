<?php include_once __DIR__ . '/../Cruda/Core.Init.php'; ?>
<?php session_destroy() ?>
<html>

<head>
    <?php include_once __DIR__ . '/../lib/includesCss.php'; ?>
    <?php include_once __DIR__ . '/../lib/includesJs.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Portada</title>
</head>

<body>
    <?php // include_once __DIR__ . '/../gui/navbar.php'; ?>
    <style>
        .jumboBig {
            height: 100% !important;
            padding-bottom: -25px;
        }
        .jumboBig * {
            vertical-align: middle !important;
        }
    </style>
    <div class="jumbotron jumboBig jumbo-pic text-white">
        <h1 class="jumbotron-titulo">
            ¡Hasta la proxima! <br />
            Ud. ha salido correctamente de los Sistemas de Intranet Vial.
        </h1>
        <div>
            <img class="logo-santacruz" src="../lib/img/logo_santacruz.png">
        </div>
        <div>
            <img class="logo-vialidad" src="../lib/img/logo_vialidad.png">
        </div>
        <p><a class="btn btn-lg btn-warning text-white" href="../Vista/index.php">VOLVER A INGRESAR</a></p>
    </div>
    <?php // include_once __DIR__ . '/../gui/footer.php'; ?>
</body>

</html>