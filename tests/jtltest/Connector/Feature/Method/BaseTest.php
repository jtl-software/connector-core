<?php

use \jtl\Connector\Feature\Method\Base as BaseMethod;

class MethodGuffle extends BaseMethod
{
    
}

class MethodTest extends PHPUnit_Framework_TestCase
{

    protected $method;

    public function setUp()
    {
        //json importer
        $this->method = new MethodGuffle('guffle', false, 'comment');
    }

    public function testIsSupported()
    {
        $this->assertFalse($this->method->isSupported());
        $method = new MethodGuffle('guffle', true);
        $this->assertTrue($method->isSupported());
    }

    public function testComment()
    {
        $this->assertEquals('comment', $this->method->comment);
    }

}