<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 

$Mapper = new \Mappers\Rol();
$ArrayFindAll = $Mapper->findAll();
$Coleccion = new \Modelo\RolColeccion($ArrayFindAll);
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Roles</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-list"> </i> Panel de Control - Roles
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <a href="Rol.Agregar.php" class="btn btn-success">
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
                            <th>Sistema</th>
                            <th>Rol</th>
                            <th style="width: 20%;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($Coleccion->getColeccion()) 
                              foreach ($Coleccion->getColeccion() as $Item) { ?>
                            <?php $Item->setSistema($Mapper->findSistemaById($Item->getFk_sistema()));?>
                            <tr>
                                <td><?= $Item->getSistema(); ?></td>
                                <td><?= $Item; ?></td>
                                <td><a name="" id="" class="btn btn-outline-warning" href="Rol.Editar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-pencil"> </i> Editar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Opciones</p>
                <p>
                    <a href="Rol.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>