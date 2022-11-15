<?php 
include_once __DIR__ . '/../vendor/autoload.php'; 
include_once __DIR__ . '/../lib/Constantes.Class.php';
?>
<?php
$Login = new \Uargflow\Login();

try {
    $Usuario = $Login->verificaUsuario($_POST['nombre_usuario']);
    $Login->verificaPass($_POST['password'], $Usuario->getPassword());
    $loginOk = true;
} catch (\Exception $ex) {
    $loginOk = false;
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
                    <h5><i class="oi oi-warning"> </i> Error de Autentificación</h5>
                </div>
                <div class="card-body bg-warning">
                    <?php if ($loginOk) { ?>
                        <h3> OK </h3>
                    <?php } ?>
                    <?php if (!$loginOk) { ?>
                        <h3> <?php echo $ex->getMessage() ?> </h3>
                    <?php } ?>                                        
                </div>
                <div class="card-footer">
                    <a href="index.php" class="btn btn-primary">
                        <i class="oi oi-account-logout"> </i> Volver
                    </a>
                    </p>
                </div>
            </div>   
            <div class="row">&nbsp;</div>

        </div>
        <?php include_once "../gui/footer.php"; ?>
    </body>
</html>


