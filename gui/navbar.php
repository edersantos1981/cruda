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
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand text-warning" href="<?= Constantes::HOMEURL ?>">
        <i class="bi-check-square"></i>
        <?= Constantes::NOMBRE_SISTEMA; ?>
    </a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../Vista/menu.php"><i class="bi bi-house-fill"></i> Portada
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-check-square"></i> Acciones R&aacute;pidas
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#"><i class="oi oi-account-login"></i> Ingreso</a>
                    <a class="dropdown-item" href="#"><i class="oi oi-account-logout"></i> Movimiento</a>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Orden de Servicio</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="oi oi-file"></i> Reportes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-gear"></i> Configuraciones
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#"><i class="bi-rulers"></i> Unidades de Medida</a>
                    <a class="dropdown-item" href="#"><i class="oi oi-document"></i> Tipos de Comprobante</a>
                    <a class="dropdown-item" href="#"><i class="bi-person-rolodex"></i> Proveedores</a>
                    <a class="dropdown-item" href="#"><i class="oi oi-list"></i> Nomenclador</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown avatar">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../gui/favicon.ico" class="rounded-circle z-depth-0" alt="avatar image" height="25">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#"><i class="bi bi-person"> </i> Valeria </a>
                    <a class="dropdown-item" href="#"><i class="bi bi-geo-alt"> </i> Sede Central </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="bi bi-person"></i>  Mis Datos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="oi oi-account-logout"></i> Salir</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--/.Navbar -->