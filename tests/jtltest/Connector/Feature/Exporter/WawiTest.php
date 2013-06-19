<?php

use jtl\Connector\Feature\Exporter\Wawi as WawiExporter;

class WawiTest extends PHPUnit_Framework_TestCase
{

    protected $content = array(
      'features' => array(
        'global' => array(
          'testfeature' => array(
            'pull' => array(
              'supported' => true,
              'comment' => 'testcomment'
            ),
            'push' => array(
              'supported' => true,
              'comment' => 'testcomment'
            )
          )
        )
      )
    );
    
    protected $exporter;

    public function setUp()
    {
        parent::setUp();
        $this->exporter = new WawiExporter($content);
    }

    public function testExport()
    {
        $ret = $this->exporter->export($this->content);
        $this->assertEquals($this->content, $ret);
        $this->assertTrue(is_array($ret));
        $this->assertTrue(count($ret)>0);
    }

}