<?php

include_once '../vendor/autoload.php';

/* 

Este es un ejemplo de uso de la Clase \Uargflow\SessionToken.

*/
// Casos de test
session_start();
\Uargflow\SessionToken::createToken();

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
                    <i class="oi oi-thumb-up"> </i> Ejemplo de uso - componente \Uargflow\SessionToken
                </h5>
            </div>
            <div class="card-body">
                <p class="lead">Ejemplos de Uso del Token check: </p>
                <div class="row">
                    <div class="col-6">
                        <form method="POST">
                            <input type="hidden" name="token" value="<?= \Uargflow\SessionToken::getToken(); ?>" />
                            <input type="submit" value="Enviar Formulario con Token" class="btn btn-block btn-success btn-lg" />
                            <small class="text-success"><i class="oi oi-check"> </i> Token de Ejemplo: <?= \Uargflow\SessionToken::getToken(); ?></small>
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="POST">
                            <input type="submit" value="Enviar Formulario sin Token" class="btn btn-block btn-danger btn-lg" />
                            <small class="text-danger"><i class="oi oi-warning"> </i> Este env&iacute;o simula un ataque CSRF.</small>
                        </form>
                    </div>
                </div>
                <hr />
                <p class="lead">A continuaci&oacute;n se observa el comportamiento del Token Check: </p>
                <table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th>Token enviado desde formulario</th>
                            <th>Token en Sesi&oacute;n</th>
                            <th>Verificado?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $_POST['token'] ?: "Vacio"; ?></td>
                            <td><?= \Uargflow\SessionToken::getToken(); ?> </td>
                            <td><?= \Uargflow\SessionToken::checkToken($_POST['token']) ? "SI" : "NO"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body jumbotron">
                <h3><i class="oi oi-thumb-up"> </i> Ayuda para Desarrolladores</h3>
                <hr />
                <p>La clase SessionToken se encuentra en el namespace \Uargflow, e implementa una protecci&oacute;n contra ataques CSRF.</p>
                <p>Para la creaci&oacute;n del Token, se emplea hashing y se utilizan datos de sesi&oacute;n. Una vez utilizado, un token se destruye autom&aacute;ticamente.</p>
                <p>Para mayor informacion, visitar https://www.php.net/manual/en/function.uniqid.php y https://www.php.net/manual/en/function.password-hash</p>
                <p>Modo de Uso</p>
                <ul>
                    <li>Paso 1 - Formulario : Crear input de tipo hidden y asignar el Token</li>
                    <li>Paso 2 - Verificaci&oacute;n : Corroborar con el método check</li>
                </ul>
                </p>
                <pre>
                    <code class="language-html" data-lang="html">
                    /* Paso 1 */
                    &lt;?php \Uargflow\SessionToken::createToken(); ?&gt;
                    &lt;input type="hidden" name="token" value="&lt;?= \Uargflow\SessionToken::getToken(); &gt; /&gt;

                    /* Paso 2 */
                    &lt;?= \Uargflow\SessionToken::checkToken($_POST['token']) ? "SI" : "NO"; ?&gt;
                    </code>
                </pre>

            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>