<?php include_once __DIR__ . '/../vendor/autoload.php'; ?>
<?php
$nombreOk = "esantos";
$passOk = "eder";

$nombreMalo = "eder";
$passMala = "passMala";

$Login = new \Uargflow\Login();

echo "<br /> Caso 1 : ";
try {
    $Usuario = $Login->verificaUsuario($nombreOk);
    var_dump($Login->verificaPass($passOk, $Usuario->getPassword()));
} catch (\Exception $ex) {
    echo $ex->getMessage();
}

echo "<br /> Caso 2 : ";
try {
    $Usuario = $Login->verificaUsuario($nombreOk);
    $Login->verificaPass($passMala, $Usuario->getPassword());
} catch (\Exception $ex) {
    echo $ex->getMessage();
}

echo "<br /> Caso 3 : ";
try {
    $Usuario = $Login->verificaUsuario($nombreMalo);
    $Login->verificaPass($passOk, $Usuario->getPassword());
} catch (\Exception $ex) {
    echo $ex->getMessage();
}

echo "<br /> Caso 4 : ";
try {
    $Usuario = $Login->verificaUsuario($nombreMalo);
    $Login->verificaPass($passMala, $Usuario->getPassword());
} catch (\Exception $ex) {
    echo $ex->getMessage();
}