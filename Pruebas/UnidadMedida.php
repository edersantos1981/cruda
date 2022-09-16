<?php
include_once "../vendor/autoload.php";

$arrayCorrecto = array(
    "id" => "1",
    "descripcion" => "m2",
);

$arrayStringConComillas = array(
    "id" => "1",
    "descripcion" => "'m\"2'",
);


/**
 * @todo 01/09/22 Arrays incompletos o incorrectos
 */

 $ObjetoValido = new \Modelo\UnidadMedida($arrayCorrecto);
 $ObjetoStringConComillas = new \Modelo\UnidadMedida($arrayStringConComillas);
 $Mapper = new \Mappers\UnidadMedida();

/**
* INSERT
*/
echo "Prueba 1 INSERT<br />";  
try {
    
    $resultado = $Mapper->insert($ObjetoValido);
    if(is_int($resultado)){
        echo "Exito: ".$resultado;
    }        

} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 1 <br />";

/**
* UPDATE
*/
echo "------------ /> <br />";
echo "Prueba 2 UPDATE <br />";  
try {
    
    $id = $Mapper->insert($ObjetoValido);
    $arrayModificado = array(
      "id" => $id,
      "descripcion" => "kg",
    );
    $ObjetoModificado = new \Modelo\UnidadMedida($arrayModificado);
    $resultado = $Mapper->update($ObjetoModificado);
    if($resultado){
      echo "Exito";
    } 

} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 2 <br />";

/**
* DELETE
*/
echo "------------ /> <br />";
echo "Prueba 3 DELET<br />";  
try {
    
    $id = $Mapper->insert($ObjetoValido);
    $resultado = $Mapper->delete($id);
    if($resultado){
      echo "Exito";
    } 

} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 3 <br />";

/**
* FINDALL
*/
echo "------------ /> <br />";
echo "Prueba 4 FINDALL <br />";  
try {
    
    $resultado = $Mapper->findAll();
    
} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 4 <br />";

/**
* FINDBYID
*/
echo "------------ /> <br />";
echo "Prueba 5 FINDBYID <br />";  
try {
    $id = $Mapper->insert($ObjetoValido);
    $resultado = $Mapper->findById($id);
    
} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 5 <br />";

/**
* STRING CON COMILLAS INSERT
*/
echo "------------ /> <br />";
echo "Prueba 6 STRING CON COMILLAS INSERT <br />";  
try {
    $id = $Mapper->insert($ObjetoStringConComillas);
    $resultado = $Mapper->findById($id);
   
    
} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 5 <br />";

/**
* STRING CON COMILLAS INSERT
*/
echo "------------ /> <br />";
echo "Prueba 6 STRING CON COMILLAS INSERT <br />";  
try {
    $resultado = $Mapper->findAll();
    $Coleccion = new \Modelo\UnidadMedidaColeccion($resultado);
   
    
} catch (\Exception $th) {
    echo "Error: ".$th->getMessage();
}
echo "<br /> fin Prueba 5 <br />";