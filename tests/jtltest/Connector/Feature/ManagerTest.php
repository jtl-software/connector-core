<?php

use jtl\Connector\Feature\Manager;

class ManagerTest extends PHPUnit_Framework_TestCase
{

    protected $manager;
    protected $producer;

    public function setUp()
    {
        $this->producer = $this->getMockBuilder('jtl\\Connector\\Feature\\Producer')
          ->disableOriginalConstructor()
          ->setMethods(array(
            'extractLayers', 'import', 'export'
          ))
          ->getMock();
        $this->manager = new Manager($this->producer);
        $this->manager->setProducer($this->producer);
    }

    public function testDefaults()
    {
        $this->assertTrue($this->producer == $this->manager->getProducer());
        $this->assertTrue($this->manager instanceof jtl\Connector\Feature\Manager);
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Manager
     */
    public function testRegisterParameters()
    {
        $this->manager->registerParameter('testparam1');
        $this->manager->registerParameters(array(
          'testmultiple1', 'testmultiple2', 'testmultiple3'
        ));
        $params = $this->manager->getParameters();
        $eparams = array(
          'testparam1' => true,
          'testmultiple1' => true,
          'testmultiple2' => true,
          'testmultiple3' => true
        );
        $this->assertEquals($eparams, $params);
        $this->manager->registerParameter('testparam1');
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Manager
     */
    public function testRegisterMethods()
    {
        $this->manager->registerMethod('testmethod1');
        $this->manager->registerMethods(array(
          'testmultiple1', 'testmultiple2', 'testmultiple3'
        ));
        $methods = $this->manager->getMethods();
        $emethods = array(
          'testmethod1' => true,
          'testmultiple1' => true,
          'testmultiple2' => true,
          'testmultiple3' => true
        );
        $this->assertEquals($emethods, $methods);
        $this->manager->registerMethod('testmethod1');
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Manager
     */
    public function testCheckProducer()
    {
        $manager = new Manager();
        $exporter = $this->getMockBuilder('jtl\\Connector\\Feature\\Exporter\\Wawi')
          ->disableOriginalConstructor()
          ->setMethods(array(
            'export'
          ))
          ->getMock();
        $manager->export($exporter);
    }

    public function testImport()
    {
        $importer = $this->getMockBuilder('jtl\\Connector\\Feature\\Importer\\Json')
        ->disableOriginalConstructor()
        ->setMethods(array('load'))
        ->getMock();
        
        $content = array('features' => array());
        
        $this->producer->expects($this->once())
          ->method('import')
          ->will($this->returnValue($content));
        
        $this->assertEquals($content, $this->manager->import($importer));
    }

    public function testExport()
    {
        $exporter = $this->getMockBuilder('jtl\\Connector\\Feature\\Exporter\\Wawi')
        ->disableOriginalConstructor()
        ->setMethods(array('export'))
        ->getMock();
        
        $content = array('features' => array());
        
        $this->producer->expects($this->once())
          ->method('export')
          ->will($this->returnValue($content));
        
        $this->assertEquals($content, $this->manager->export($exporter));
    }

    public function testTransform()
    {
        $content = array('features' => array());
        $importer = $this->getMockBuilder('jtl\\Connector\\Feature\\Importer\\Json')
        ->disableOriginalConstructor()
        ->setMethods(array('load'))
        ->getMock();
        
        $this->producer->expects($this->once())
          ->method('import')
          ->will($this->returnValue($content));
        
        $exporter = $this->getMockBuilder('jtl\\Connector\\Feature\\Exporter\\Wawi')
        ->disableOriginalConstructor()
        ->setMethods(array('export'))
        ->getMock();
        
        $this->producer->expects($this->once())
          ->method('export')
          ->will($this->returnValue($content));
        
        $this->assertEquals($content, $this->manager->transform($importer, $exporter));
    }

}