<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 

$Mapper = new \Mappers\Subcuenta();
$ObjetoCreado = new \Modelo\Subcuenta($Mapper->findById($_GET['id']));
?>
<html>

<head>

    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
        <?php include_once '../lib/includeComboboxJQueryUI.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - SubCuentas</title>
    
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Editar Subcuenta
                </h5>
            </div>
            <div class="card-body">
                <form action="Subcuenta.Editar.Procesar.php" method="post">
                    <?php include_once 'Subcuenta.Formulario.php'; ?>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../gui/footer.php'; ?>
</body>

</html>