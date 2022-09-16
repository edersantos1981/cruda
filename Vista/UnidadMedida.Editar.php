<?php

include_once '../lib/Constantes.Class.php';
include_once '../vendor/autoload.php';

$Mapper = new \Mappers\UnidadMedida();
$ObjetoCreado = new \Modelo\UnidadMedida($Mapper->findById($_GET['id']));
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Unidades de Medida</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Editar Unidad de Medida
                </h5>
            </div>
            <div class="card-body">
                <form action="UnidadMedida.Editar.Procesar.php" method="post">
                    <input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
                    <div class="form-group">
                        <label for="descripcion">Descripci&oacute;n</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getDescripcion() : null; ?>" required>
                    </div>

                    <input type="submit" class="btn btn-success" value="Confirmar" />
                    <a href="UnidadMedida.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../gui/footer.php'; ?>
</body>

</html>