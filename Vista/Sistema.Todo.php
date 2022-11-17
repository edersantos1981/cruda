<?php 
include_once __DIR__ . '/../Cruda/Core.Init.php'; 
// \Cruda\SessionManager::checkPermisoRedirect(\Cruda\Constantes::PERMISO_USUARIOS);
?>
<?php

$Mapper = new \Mappers\Sistema();
$ArrayFindAll = $Mapper->findAll();
$Coleccion = new \Modelo\SistemaColeccion($ArrayFindAll);
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
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-list"> </i> Panel de Control - Sistemas
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <a href="Sistema.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>

                <script>
                    var columnasSinSort = [1];
                </script>
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
                                    <?= $Item; ?>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-outline-warning" href="Sistema.Editar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-pencil"> </i> Editar</a>
                                </td>
                            </tr>
                        <?php
                        } ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Opciones</p>
                <p>
                    <a href="Sistema.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>