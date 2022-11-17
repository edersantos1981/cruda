<?php

include_once '../vendor/autoload.php';

$Mapper = new \Mappers\Cuenta();
$ArrayFindAll = $Mapper->findAll();
$Coleccion = new \Modelo\CuentaColeccion($ArrayFindAll);
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Cuentas</title>
</head>

<body>
    <script>
        var idObjeto = 0;

        function cambiaHrefBottonEliminar(idObjetoAEliminar) {
            $("#enlaceEliminar").attr("href", "Cuenta.Eliminar.php?id=" + idObjetoAEliminar);
        }
    </script>
    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-list"> </i> Panel de Control - Cuentas
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <a href="Cuenta.Agregar.php" class="btn btn-success">
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
                                    <a name="" id="" class="btn btn-outline-warning" href="Cuenta.Editar.php?id=<?= $Item->getId(); ?>" role="button"><i class="oi oi-pencil"> </i> Editar</a>
                                    <a name="" id="" class="btn btn-outline-danger" href="Cuenta.Eliminar.php?id=<?= $Item->getId(); ?>" role="button" data-toggle="modal" data-target="#exampleModalCenter" onClick="cambiaHrefBottonEliminar(<?= $Item->getId(); ?>);"><i class="oi oi-circle-x">
                                        </i>
                                        Eliminar</a>
                                </td>
                            </tr>
                        <?php
                        } ?>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro desea eliminar?</p>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>ATENCI&Oacute;N:</strong> Usted no podr&aacute; recuperar
                                            los datos borrados.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No quiero
                                            Eliminar</button>
                                        <a name="" id="enlaceEliminar" class="btn btn-outline-danger" role="button" href="#"><i class="oi oi-trash"> </i> Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Opciones</p>
                <p>
                    <a href="Cuenta.Agregar.php" class="btn btn-success">
                        <i class="oi oi-plus"> </i> Agregar
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>