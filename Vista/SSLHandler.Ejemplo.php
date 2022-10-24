<?php

include_once '../vendor/autoload.php';

/* 

Este es un ejemplo de uso de la Clase \Uargflow\SSLHandler.

*/

// Casos de test
$ArrayData['1']  = "Sede Central";
$ArrayData['2'] = "Distrito Río Gallegos";
$ArrayData['3'] = "Distrito El Calafate";

?>

<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - SSL Handler</title>
</head>

<body>

    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-thumb-up"> </i> Ejemplo de uso - componente \Uargflow\SSLHandler
                </h5>
            </div>
            <div class="card-body">
                <table id="csvtable" class="table table-striped table-hover table-responsive table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th nowrap>Texto Plano</th>
                            <th >Encriptado</th>
                            <th nowrap>Descifrado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ArrayData as $Item) {
                        ?>
                            <tr>
                                <td nowrap><?= $Item; ?></td>
                                <td><?php $a = \Uargflow\SSLHandler::encrypt($Item); echo $a?></td>
                                <td nowrap><?= \Uargflow\SSLHandler::decrypt($a); ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-body jumbotron">
                <h3><i class="oi oi-thumb-up"> </i> Ayuda para Desarrolladores</h3>
                <hr />
                <p>La clase SSLHandler se encuentra en el namespace \Uargflow, e implementa la interface SSLHandlerInterface.</p>
                <p>Esta clase permite encriptar y descifrar datos mediante la libreria OpenSSL y un vector de inicializac&oacute;n pseudorandom.</p>
                <p>Para mayor informacion, visitar https://www.php.net/manual/en/refs.crypto.php</p>
                <pre>
                    <code class="language-html" data-lang="html">
                    $datosEncriptados = \Uargflow\SSLHandler::encrypt($cadenaDeTexto);
                    $datosDescifrados = \Uargflow\SSLHandler::decrypt($datosEncriptados);
                    </code>
                </pre>

            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>