<?php include_once __DIR__ . '/../Cruda/Core.Init.php'; ?>
<style>
    .admin-bi {
        font-size: 3rem;
        padding: 2rem;
    }
</style>

<div class="container-fluid bg-light card card-body">
    <div class="row text-center">
        <?php if(\Cruda\SessionManager::checkPermiso(\Cruda\PermisosSistema::ABM_GENERAL)) { ?>
        <div class="col-md-6 col-sm-12">
            <br />
            <p><i class="shadow-lg admin-bi oi oi-monitor text-white bg-warning rounded-circle border-secondary" style="font-size: 2rem; padding: 1.5rem;"> </i> </p>
            <h2>Sistemas</h2>
            <!-- <p>Movimientos de Salida de Art&iacute;culos</p> -->
            <p><a class="btn btn-primary btn-lg btn-block shadow-lg" href="../Vista/Sistema.Todo.php" role="button"> <i class="bi bi-pc-display"> </i> Ir a Sistemas</a></p>
            <br />
        </div>
        <?php } ?>

        <div class="col-md-6 col-sm-12">
            <br />
            <p><i class="shadow-lg admin-bi oi oi-person text-white bg-warning rounded-circle border-secondary" style="font-size: 2rem; padding: 1.5rem;"> </i> </p>
            <h2>Usuarios</h2>
            <!-- <p>Movimientos de Entrada de Art&iacute;culos</p> -->
            <p><a class="btn btn-primary btn-lg btn-block shadow-lg" href="../Vista/Usuario.Todo.php" role="button"> <i class="bi bi-person-fill"> </i> Ir a Usuarios</a></a></p>
            <br />
        </div>
        <?php if(\Cruda\SessionManager::checkPermiso(\Cruda\PermisosSistema::ABM_GENERAL)) { ?>
        <div class="col-md-6 col-sm-12">
            <br />
            <p><i class="shadow-lg admin-bi oi oi-file text-white bg-warning rounded-circle border-secondary" style="font-size: 2rem; padding: 1.5rem;"> </i> </p>
            <h2>Roles</h2>
            <!-- <p>Generador de informes </p> -->
            <p><a class="btn btn-primary btn-lg btn-block shadow-lg" href="../Vista/Rol.Todo.php" role="button"> <i class="oi oi-account-login"> </i> Ir a Reportes</a></p>
            <br />
        </div>
        <?php } ?>
        <?php if(\Cruda\SessionManager::checkPermiso(\Cruda\PermisosSistema::ABM_GENERAL)) { ?>
        <div class="col-md-6 col-sm-12">
            <br />
            <p><i class="shadow-lg admin-bi oi oi-list text-white bg-warning rounded-circle border-secondary" style="font-size: 2rem; padding: 1.5rem;"></i></p>
            <h2>Permisos</h2>
            <!-- <p>Codificador de Art&iacute;culos</p> -->
            <p><a class="btn btn-primary btn-lg btn-block shadow-lg" href="../Vista/Permiso.Todo.php" role="button"> <i class="oi oi-account-login"> </i> Ir a Nomenclador</a></p>
            <br />
        </div>
        <?php } ?>
    </div>
</div>