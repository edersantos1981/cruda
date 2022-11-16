<?php


/* Eso debe venir de la base de Datos */
$arrayPermisosBD = array(1 => "Insertar", 2 => "Actualizar Datos", 3 => "Consulta", 4 => "Autorizacion Supervisor");
$arrayPermisosUsuario = array(1=>"Insertar", 3=>"Consulta");

echo "array 1 <br />(todos los permisos en BD) : "; var_dump($arrayPermisosBD);
echo "<br />";
echo "<br />";
 
echo "array 2 <br />(los permisos de un User) : ";
var_dump($arrayPermisosUsuario);
echo "<br />";
echo "JSON (User - almacena en sesión) : ";
$jsonPermisosUsuario = json_encode(array_keys($arrayPermisosUsuario));
echo $jsonPermisosUsuario;
echo "<br />";
echo "<br />";



/* Creación y Escritura de Archivo / Clase PermisosSistema*/
$archivoClasePermisos = fopen("./PermisosSistema.php", "w") or die("Unable to open file!");
fwrite($archivoClasePermisos, "<?php \n");
fwrite($archivoClasePermisos, "namespace Cruda; \n");
fwrite($archivoClasePermisos, "class PermisosSistema { \n");
foreach ($arrayPermisosBD as $idPermiso => $nombrePermiso) {
    $nombreTratado = strtoupper(str_replace(" ", "_", $nombrePermiso));
    fwrite($archivoClasePermisos, "\tconst {$nombreTratado} = {$idPermiso}; \n");
}
fwrite($archivoClasePermisos, "} \n");
fclose($archivoClasePermisos);

include_once './PermisosSistema.php';


echo "<hr />Busqueda desde JSON json_decode <br />";
$jsonDec = json_decode($jsonPermisosUsuario);

foreach ($arrayPermisosBD as $idPermiso_ => $nombrePermiso_) {
    echo "Buscando Permiso #{$idPermiso_} - {$nombrePermiso_} : ";
    echo in_array($idPermiso_, $jsonDec) ? "Encontrado" : "Not found";
    echo "<br />";
}

echo "<hr /> Codigo de la Clase creada dinámicamente a partir de los permisos en el array / BD<br />";
show_source("./PermisosSistema.php");