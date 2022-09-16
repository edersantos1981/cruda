<?php

namespace Mappers;

use PHPUnit\Framework\TestCase;

/**
 * Description of PermisoTest
 *
 * @author usuario
 */
class PermisoTest extends TestCase {

    /**
     * @var Permiso
     */
    protected $object;
    
    /**
     *
     * @var Int id del objeto.
     */
    private $idObjeto;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Permiso();
    }

    /**
     * Ejemplo de test exitoso.
     * 
     * Verifica el retorno del método insert, 
     * que corresponde al id del elemento creado.
     * 
     */
    public function testInsert() {
        
        $Permiso = new \Modelo\Permiso(array("nombre"=>"Eder"));
        $this->idObjeto = $this->object->insert($Permiso);
        
        $this->assertInternalType("integer", $this->idObjeto);
        
        $this->object->delete($this->idObjeto);
    }

    /**
     * Acá un ejemplo de test que NO VA a pasar.
     * 
     * El código fuente del método insert ESTÁ MAL, 
     * pues no verifica el valor del atributo nombre 
     * y formatea el nulo entre comillas
     * (y se carga como una cadena vacía en la BD).
     * 
     * @expectedException \Exception
     * 
     */
    public function testInsertNulo() {
        
        $Permiso = new \Modelo\Permiso(array("nombre"=>null));
        $this->idObjeto = $this->object->insert($Permiso);
        
        $this->object->delete($this->idObjeto);
    }
    
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
        
    }

}
