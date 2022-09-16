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
                    <i class="oi oi-plus"> </i> Agregar Unidad de Medida
                </h5>
            </div>
            <div class="card-body">
                <form action="UnidadMedida.Agregar.Procesar.php" method="post">
                    <div class="form-group">
                        <label for="descripcion">Descripci&oacute;n</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Confirmar" />
                    <a href="UnidadMedida.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>
                </form>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>