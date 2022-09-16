<?php

include_once '../vendor/autoload.php';

$Mapper = new \Mappers\UnidadMedida();
$ArrayFindAll = $Mapper->findAll();
$Coleccion = new \Modelo\UnidadMedidaColeccion($ArrayFindAll);
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Unidades de Medida</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-list"> </i> Panel de Control - Unidades de Medida
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <a href="UnidadMedida.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>

                <script>var columnasSinSort = [1];</script>
                <script src="../gui/tablaSort.js"></script>
                <table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th>Descripci&oacute;n</th>
                            <th style="width: 20%;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Coleccion->getColeccion() as $Item) { ?>
                            <tr>
                                <td>
                                    <?= $Item->getDescripcion(); ?>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-outline-warning" href="UnidadMedida.Editar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-pencil"> </i> Editar</a>
                                    <a name="" id="" class="btn btn-outline-danger" href="UnidadMedida.Eliminar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-circle-x"> </i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Opciones</p>
                <p>
                    <a href="UnidadMedida.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>