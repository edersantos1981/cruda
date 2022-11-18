<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 
\Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::BLANQUEO_CLAVE);

$Mapper = new \Mappers\Usuario();
$ObjetoCreado = new \Modelo\Usuario($Mapper->findById($_GET['id']));
?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/includeComboboxJQueryUI.php' ?>
    <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Usarios</title>
</head>

<body>
    <?php include_once '../gui/navbar.php'; ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-pencil"> </i> Blanquear Contraseña
                </h5>
            </div>
            <div class="card-body">
                <form action="Usuario.Blanqueo.Procesar.php" method="post">
                    <input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">

                    <div class="form-group col-md-4">

                        <label for="password">Nueva Contrase&ntilde;a</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="new-password" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="ojo-btn-new" type="button">
                                    <i id="ojo-icono-new" class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!--<div class="form-group col-md-4">

                        <label for="descripcion">Confirmar Contrase&ntilde;a</label>
                        <div class="input-group mb-3">
                            <input type="password" name="confirm-password" id="confirm-password" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="ojo-btn-confirm" type="button">
                                    <i id="ojo-icono-confirm" class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                    </div>-->

                    <input type="submit" class="btn btn-success" value="Confirmar" />
                    <a href="Usuario.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>
                </form>
                <?php include_once '../lib/toggleVisiblePassword.php'; ?>
            </div>
        </div>
    </div>
    <?php include_once '../gui/footer.php'; ?>
</body>

</html>