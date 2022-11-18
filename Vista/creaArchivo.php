<?php
/* Eso debe venir de la base de Datos */
$arrayPermisosBD = array(1 => "Administrar el Sistema", 2=> "AltaMod Usuarios", 3 => "Blanqueo Clave", 4 => "General");

/* Creación y Escritura de Archivo / Clase PermisosSistema*/
$archivoClasePermisos = fopen(__DIR__ . "/../Cruda/PermisosSistema.php", "w") or die("Unable to open file!");
fwrite($archivoClasePermisos, "<?php \n");
fwrite($archivoClasePermisos, "namespace Cruda; \n");
fwrite($archivoClasePermisos, "class PermisosSistema { \n");
foreach ($arrayPermisosBD as $idPermiso => $nombrePermiso) {
    $nombreTratado = strtoupper(str_replace(" ", "_", $nombrePermiso));
    fwrite($archivoClasePermisos, "\tconst {$nombreTratado} = {$idPermiso}; \n");
}
fwrite($archivoClasePermisos, "} \n");
fclose($archivoClasePermisos);