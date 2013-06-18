<?php

use jtl\Connector\Feature\Feature\Feature;
use jtl\Connector\Feature\Method\Pull;

class FeatureTest extends PHPUnit_Framework_TestCase
{

    protected $feature;

    public function setUp()
    {
        parent::setUp();
        $this->feature = new Feature();
    }

    public function testAddMethod()
    {
        $method = new Pull('pull');
        $this->feature->addMethod($method);
        $this->assertEquals($method, $this->feature->getMethod('pull'));
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Method
     */
    public function testAddExistingMethod()
    {
        $method = new Pull('pull');
        $this->feature->addMethod($method);
        $this->feature->addMethod(new Pull('pull'));
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Method
     */
    public function testGetNotexistingMethod()
    {
        $this->feature->getMethod('not existing method');
    }

    public function testDelMethod()
    {
        $method = new Pull('pull');
        $this->feature->addMethod($method);
        $this->feature->delMethod('pull');
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Method
     */
    public function testDelNotexistingMethod()
    {
        $this->feature->delMethod('not existing method');
    }

}