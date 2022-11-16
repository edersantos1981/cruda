<?php
include_once __DIR__ . '/../Cruda/Core.Init.php';

try {

    $Login = new \Cruda\Login();

    $Usuario = $Login->verificaUsuario($_POST['nombre_usuario']);
    $Login->verificaPass($_POST['password'], $Usuario->getPassword());

    $MapperUsuario = new \Mappers\Usuario();
    $UsuarioPermisos = $MapperUsuario->findPermisosJSON($Usuario->getId());

    $_SESSION['nombre_usuario']  = $Usuario->getNombre_usuario();
    $_SESSION['nombre_completo'] = $Usuario->getNombre_completo();
    $_SESSION['permisos'] = $UsuarioPermisos;
    
    $loginOk = true;
    $_SESSION['login_status'] = \Cruda\Login::LOGIN_OK;
    header('Location: ../Vista/menu.php');
    
} catch (\Exception $ex) {

    $loginOk = false;
    if (isset($Usuario))
        $_SESSION['login_status'] = \Cruda\Login::LOGIN_ERROR_PASS;
    if (!isset($Usuario))
        $_SESSION['login_status'] = \Cruda\Login::LOGIN_ERROR_NOMBRE_USUARIO;
    header('Location: ../Vista/index.php?error=' . $ex->getMessage());
}


?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Permisos</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-key"> </i> Ingreso al Sistema</h5>
            </div>
            <div class="card-body">
                <?php if ($loginOk) { ?>
                    <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                    <p>Su usuario fue autenticado</p>
                <?php } ?>
                <?php if (!$loginOk) { ?>
                    <p class="alert alert-danger">Hubo un error</p>
                    <p><?php echo $ex->getMessage(); ?></p>
                    <p>Por favor intente nuevamente. Si el problema persiste, entre en contacto con la Direcci&oacute;n de Inform&aacute;tica.</p>
                <?php } ?>
            </div>

            <div class="card-footer">
                <?php if ($loginOk) { ?>
                    <a href="menu.php" class="btn btn-primary">
                        <i class="oi oi-account-logout"> </i> Ir al Menu
                    </a>
                <?php } ?>
                <?php if (!$loginOk) { ?>
                    <a href="index.php" class="btn btn-primary">
                        <i class="oi oi-account-logout"> </i> Volver
                    </a>
                <?php } ?>

                </p>
            </div>
        </div>
        <div class="row">&nbsp;</div>

    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>