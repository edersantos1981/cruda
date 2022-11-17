<?php

include_once __DIR__ . '/../Cruda/Core.Init.php'; 

/* 

Este es un ejemplo de uso de la Clase \Cruda\SessionManager.

*/

// Casos de test
$handler = new \Cruda\SessionManager();
session_set_save_handler($handler, true);
\Cruda\SessionManager::start_session('cruda', true);

$_SESSION['var1']  = "Sede Central";
$_SESSION['var2'] = "Distrito Río Gallegos";
$_SESSION['var3'] = "Distrito El Calafate";
?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
        <title><?= \Cruda\Constantes::NOMBRE_SISTEMA; ?> - Session Manager</title>
</head>

<body>

    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-thumb-up"> </i> Ejemplo de uso - componente \Cruda\SessionManager
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
                <p>La clase SessionManager se encuentra en el namespace \Cruda, e implementa la interface SessionHandlerInterface</p>
                <p>Se alamacenan los datos de sesi&oacute;n en la base de datos</p>
                <p>Para mayor informacion, visitar https://www.php.net/manual/en/class.sessionhandlerinterface.php</p>
                <pre>
                    <code class="language-html" data-lang="html">
                    $handler = new \Cruda\SessionManager();
                    session_set_save_handler($handler, true);
                    \Cruda\SessionManager::start_session('nombre de la sesión', true);
                    $_SESSION['var1'] = "primera variable de sesión";
                    </code>
                </pre>

            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>