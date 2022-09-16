<!-- Los estilos de navbar son definidos en la libreria css de Bootstrap -->
<?php
/**
 * @see https://getbootstrap.com/docs/4.0/components/navbar/
 */
?>
<style>
    .navbar {
        border-bottom-color: #ffc107 !important;
        border-bottom-width: 2px !important;
    }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="padding: 20px 5%">

    <a class="navbar-brand text-warning" href="<?= Constantes::HOMEURL ?>">
        <i class="oi oi-monitor" ></i>
        <?= Constantes::NOMBRE_SISTEMA; ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon"></span>   
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
<!--        <ul class="navbar-nav ml-auto">

            <li class = "nav-item ml-1">
                <a class = "nav-link btn btn-info btn-sm" href = "../Vista/alumnos.php">
                    <span class = "oi oi-person"></span> Alumnos
                </a>
            </li>

            <li class = "nav-item ml-1">
                <a class = "nav-link btn btn-info btn-sm" href = "../app">
                    <span class = "oi oi-graph" ></span> Entrevistas
                </a>
            </li>

            <li class="nav-item dropdown ml-1">
                <a class="nav-link dropdown-toggle btn btn-info btn-sm" href="#"  id="navbarDropdownConfig" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="oi oi-cog" ></span> Configuracion
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                    <a class="dropdown-item" href="../Vista/diagnosticos.php">
                        <span class="oi oi-cog" ></span>  Diagnosticos
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../Vista/carreras.php">
                        <span class="oi oi-cog" ></span> Carreras
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../Vista/asignaturas.php">
                        <span class="oi oi-cog" ></span> Asignaturas
                    </a>
                </div>
            </li>

            <?php // if (ControlAcceso::verificaPermiso(PermisosSistema::PERMISO_USUARIOS)) { ?>
            <li class="nav-item dropdown ml-1 ">
                <a class="nav-link dropdown-toggle btn btn-info btn-sm" href="#"  id="navbarDropdownUsuarios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="oi oi-person" ></span> Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                    <a class="dropdown-item" href="../uargflow/usuarios.php">
                        <span class="oi oi-person" ></span> Usuarios
                    </a>
                    <div class="dropdown-divider"></div>
                    <?php // if (ControlAcceso::verificaPermiso(PermisosSistema::PERMISO_ROLES)) { ?>
                    <a class="dropdown-item" href="../uargflow/roles.php">
                        <span class = "oi oi-graph" ></span> Roles
                    </a>
                    <div class="dropdown-divider"></div>
                    <?php // } ?>
                    <?php // if (ControlAcceso::verificaPermiso(PermisosSistema::PERMISO_PERMISOS)) { ?>
                    <a class="dropdown-item" href="../uargflow/permisos.php">
                        <span class="oi oi-lock-locked" ></span> Permisos
                    </a>

                    <?php // } ?>
                </div>
            </li>
            <?php // } ?>


            <li class="nav-item ml-1">
                <a class="nav-link btn btn-outline-info btn-sm" href="../uargflow/salir.php">
                    <span class="oi oi-account-logout" ></span> Salir
                </a>
            </li>
        </ul>-->
    </div>
</nav>

<!-- 
<?php if (isset($_SESSION['usuarioResidencia'])) { ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding-left: 5%; padding-right: 5% ">
        Ud. est&aacute; conectad@ como <strong><?= $_SESSION['usuarioResidencia']->nombre; ?></strong>.        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-right: 5%">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
-->
