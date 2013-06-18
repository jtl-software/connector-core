<?php

use jtl\Connector\Feature\Base\Base as BaseClass;

class FapFapFap extends BaseClass
{
    protected $_name = 'fapfapfap';
}

class BaseTest extends PHPUnit_Framework_TestCase
{

    protected $fapfapfap;

    public function setUp()
    {
        $this->fapfapfap = new FapFapFap();
    }

    public function testSetName()
    {
        $s = 'fapfapfap... almost.... THERE!!!';
        $this->fapfapfap->setName($s);
        $this->assertEquals($s, $this->fapfapfap->getName());
        $this->assertFalse($this->fapfapfap->setName($s));
    }

}