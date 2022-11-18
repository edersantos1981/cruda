<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 
include_once __DIR__ . '/../Cruda/Constantes.php';
\Cruda\SessionManager::checkPermisoRedirect(\Cruda\PermisosSistema::ABM_GENERAL);


$ObjetoCreado = new \Modelo\Rol($_POST);
if (isset($_POST['permiso'])) {
    foreach ($_POST['permiso'] as $idPermiso => $foo) {
        $Permisos[] = new \Modelo\Permiso(array("id" => $idPermiso));
    }
    $ObjetoCreado->setPermisos($Permisos);
}

try {
    $Mapper = new \Mappers\Rol();
    $objetoEditado = $Mapper->update($ObjetoCreado);
} catch (\Exception $ex) {
    $objetoEditado = false;
}

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
        <div class="card">
            <div class="card-header">
                <h5><i class="oi oi-pencil"> </i> Editar Rol</h5>
            </div>
            <div class="card-body">
                <?php if ($objetoEditado) { ?>
                    <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                    <p>Rol editado correctamente.</p>
                <?php } ?>
                <?php if (!$objetoEditado) { ?>
                    <p class="alert alert-danger">Hubo un error</p>
                    <p>No fue posible editar el Rol. Por favor, intente nuevamente. Si el problema persiste, contacte el administrador del sistema.</p>
                <?php } ?>
            </div>
            <div class="card-footer">
                <p>Opciones:</p>
                <p>
                    <a href="Rol.Todo.php" class="btn btn-outline-primary">
                        <i class="oi oi-list"> </i> Ir a Panel de Control
                    </a>
                </p>
            </div>
        </div>
        <div class="row">&nbsp;</div>

    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>