<?php

use \jtl\Connector\Feature\Producer;
use \jtl\Connector\Feature\Manager;
use \jtl\Connector\Feature\Exporter\Wawi;

class ProducerTest extends PHPUnit_Framework_TestCase
{

    protected $producer;
    protected $importer;
    protected $manager;
    protected $content = array(
      Producer::FEATURES_KEY => array(
        'group1' => array(
          "company" => array(
            "push" => array(
              "supported" => true,
              "comment" => ""
            ),
            "pull" => array(
              "supported" => true,
              "comment" => ""
            )
          ),
          "fapony" => array(
            "push" => array(
              "supported" => true,
              "comment" => ""
            ),
            "pull" => array(
              "supported" => true,
              "comment" => ""
            )
          ),
        ),
        'image' => array(
          "image" => array(
            "push" => array(
              "supported" => true,
              "comment" => ""
            ),
            "pull" => array(
              "supported" => true,
              "comment" => ""
            )
          ),
          "relationTypes" => array("product", "category", "manufacturer", "specific",
            "specificValue", "configGroup")
        ),
      )
    );

    public function setUp()
    {
        $this->producer = new Producer();
        $this->manager = new Manager($this->producer);
        $this->importer = $this->getMockBuilder('jtl\\Connector\\Feature\\Importer\\Json')
          ->disableOriginalConstructor()
          ->setMethods(array('load'))
          ->getMock();
        $this->manager->registerMethods(array('pull', 'push'));
        $this->manager->registerParameters(array('supported', 'comment'));
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testParseWithoutImporter()
    {
        $this->producer->parse();
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testImportEmptyLoad()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue(null));
        $this->producer->import($this->importer);
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testImportNoArrayLoad()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue('false'));
        $this->producer->import($this->importer);
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testImportNoFeatureKeyLoad()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue(array('bla')));
        $this->producer->import($this->importer);
    }

    public function testImportOk()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $this->producer->import($this->importer);
    }
    
    public function testExportOk()
    {
        $exporter = new Wawi();
        $this->producer->export($exporter);
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testExtractLayersNoMethods()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $this->producer->setManager(
          new Manager($this->producer)
        );
        $this->producer->import($this->importer);
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Producer
     */
    public function testExtractLayersNoParameters()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $manager = new Manager($this->producer);
        $manager->registerMethod('testMethod');
        $this->producer->import($this->importer);
    }

    public function testGetManager()
    {
        $this->assertEquals($this->manager, $this->producer->getManager());
    }

    public function testGetGroups()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $this->producer->import($this->importer);
        $groups = $this->producer->getGroups();
        $this->assertTrue(!empty($groups) && is_array($groups));
        $this->assertTrue(count($groups) > 0);
    }

    public function testGetFeatures()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $this->producer->import($this->importer);
        $features = $this->producer->getFeatures();
        $this->assertTrue(!empty($features) && is_array($features));
        $this->assertTrue(count($features) > 0);
    }

    public function testGetMethods()
    {
        $this->importer->expects($this->once())
          ->method('load')
          ->will($this->returnValue($this->content));
        $this->producer->import($this->importer);
        $methods = $this->producer->getMethods();
        $this->assertTrue(!empty($methods) && is_array($methods));
        $this->assertTrue(count($methods) > 0);
    }

}