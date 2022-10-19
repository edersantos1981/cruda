<?php

include_once '../vendor/autoload.php';

/* 

Este es un ejemplo de uso de la Clase \Uargflow\SessionManager.

*/

// Casos de test
$handler = new \Uargflow\SessionManager();
session_set_save_handler($handler, true);

\Uargflow\SessionManager::start_session('dogo', true);
$_SESSION['var1'] = "Eder el groso";
$_SESSION['var2'] = "Victor el maestro";
$_SESSION['var3'] = "Franco el mas capo";

//session_destroy();
?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - Session Manager</title>
</head>

<body>

    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-thumb-up"> </i> Ejemplo de uso - componente \Uargflow\SessionManager
                </h5>
            </div>
            <div class="card-body">
                <table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th>Llave</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION as $Item => $valor) {
                        ?>
                            <tr>
                                <td><?= $Item; ?></td>
                                <td><?= $valor ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-body jumbotron">
                <h3><i class="oi oi-thumb-up"> </i> Ayuda para Desarrolladores</h3>
                <hr />
                <p>La clase SessionManager se encuentra en el namespace \Uargflow, e implementa la interface SessionHandlerInterface</p>
                <p>Se alamacenan los datos de sesi&oacute;n en la base de datos</p>
                <p>Para mayor informacion, visitar https://www.php.net/manual/en/class.sessionhandlerinterface.php</p>
                <pre>
                    <code class="language-html" data-lang="html">
                    $handler = new \Uargflow\SessionManager();
                    session_set_save_handler($handler, true);
                    \Uargflow\SessionManager::start_session('nombre de la sesión', true);
                    $_SESSION['var1'] = "primera variable de sesión";
                    </code>
                </pre>

            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>