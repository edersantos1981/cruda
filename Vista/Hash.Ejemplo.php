<?php

include_once '../vendor/autoload.php';

/* 

Este es un ejemplo de uso de la Clase \Cruda\Hash, en distintas modalidades:

- Algoritmo BCrypt
- Algoritmo Argon2i
- Algoritmo utilizado por defecto en el servidor

A partir de ello, también permite la verificación de contraseñas.

*/


// Casos de test
$password1 = 123;
$password2 = 321;

$arrayPasswords['passBCrypt1']  = new \Cruda\Hash($password1, PASSWORD_BCRYPT);
$arrayPasswords['passArgon2i1'] = new \Cruda\Hash($password1, PASSWORD_ARGON2I);
$arrayPasswords['passDefault1'] = new \Cruda\Hash($password1, PASSWORD_DEFAULT);
$arrayPasswords['passBCrypt2']  = new \Cruda\Hash($password2, PASSWORD_BCRYPT);
$arrayPasswords['passArgon2i2'] = new \Cruda\Hash($password2, PASSWORD_ARGON2I);
$arrayPasswords['passDefault2'] = new \Cruda\Hash($password2, PASSWORD_DEFAULT);

?>
<html>

<head>
    <?php include_once '../lib/includesCss.php'; ?>
    <?php include_once '../lib/includesJs.php'; ?>
    <?php include_once '../lib/Constantes.Class.php'; ?>
    <title><?= Constantes::NOMBRE_SISTEMA; ?> - HASH</title>
</head>

<body>

    <?php include_once '../gui/navbar.php'; ?>
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="oi oi-thumb-up"> </i> Ejemplo de uso - componente \Cruda\Hash
                </h5>
            </div>
            <div class="card-body">

                <form class="form-inline" method="post">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Ingrese la password</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingrese la password">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="123" name="password">
                        <small for="inputPassword2">123 o 321 verificar&aacuten; correctamente. Cualquier otra = error.</small>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Verificar</button>
                </form>

                <table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
                    <thead>
                        <tr class="table-info">
                            <th>Pass Ejemplo</th>
                            <th>M&eacute;todo</th>
                            <th>Hash obtenido</th>
                            <th>Necesita rehacer?</th>
                            <th>Input Formulario</th>
                            <th>Verificaci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrayPasswords as $Item) {
                        ?>
                            <tr>
                                <td><?= $Item->getPassword(); ?></td>
                                <td><?= $Item->getHashInfoAlgoritmo() ?></td>
                                <td><?= $Item->getPasswordHash() ?></td>
                                <td><?= $Item->getNeedsRehash() ?></td>
                                <td><?= $_POST['password']; ?></td>
                                <td><?= $Item->verificaPasswordCorrecta($_POST['password']) ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-body jumbotron">
                <h3><i class="oi oi-thumb-up"> </i> Ayuda para Desarrolladores</h3>
                <hr />
                <p>La clase Hash se encuentra en el namespace \Cruda, y posee los siguientes m&eacute;todos :</p>
                <ul>Hash::creaHash($password_, $metodoAutentificacion_) - Crea un Hash (contrase&ntilde;a encriptada). </ul>
                <ul>Hash::verificaPasswordHashBD($password_, $hashBD_) - Compara una contrase&ntilde;a con un hash almacenado en alguna fuente de datos. </ul>
                <p>Para mayor informacion, visitar https://www.php.net/manual/es/ref.password.php</p>
            </div>
        </div>
    </div>
    <?php include_once "../gui/footer.php"; ?>
</body>

</html>