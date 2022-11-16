<?php

include_once '../vendor/autoload.php';

$Mapper = new \Mappers\Usuario();
$ArrayFindAll = $Mapper->findAll();
$Coleccion = new \Modelo\UsuarioColeccion($ArrayFindAll);
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Usuarios</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-list"> </i> Panel de Control - Usuarios
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <a href="Usuario.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>

                <script>
                    var columnasSinSort = [2];
                </script>
                <script src="../gui/tablaSort.js"></script>
               
                <table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th>Usuario</th>
                            <th>Nombre Completo</th>
                            <th style="width: 20%;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Coleccion->getColeccion() as $Item) { ?>
                            <tr>
                                <td><?= $Item->getNombre_usuario(); ?></td>
                                <td><?= $Item->getNombre_completo(); ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-outline-warning" href="Usuario.Editar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-pencil"> </i> Editar</a>
                                    <a name="" id="" class="btn btn-outline-success" href="Usuario.Blanqueo.php?id=<?= $Item->getId(); ?>" role="button"><i class="bi bi-key"> </i> Blanqueo</a>
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
                    <a href="Usuario.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>