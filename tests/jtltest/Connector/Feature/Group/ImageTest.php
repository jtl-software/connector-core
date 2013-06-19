<?php

use jtl\Connector\Feature\Group\Image;

class ImageTest extends PHPUnit_Framework_TestCase
{

    protected $relations = array(
      Image::RELATIONS_KEY_NAME => array(
        'relation1',
        'relation2'
      )
    );
    protected $group;

    public function setUp()
    {
        parent::setUp();
        $c = (array) $this->relations;
        $this->group = new Image($c);
    }

    public function testGetRelations()
    {
        $this->assertNotEquals($this->relations, $this->group->getRelations());
        $this->assertEquals($this->relations[Image::RELATIONS_KEY_NAME], $this->group->getRelations());
        $c = array();
        $group = new Image($c);
        $this->assertEquals(array(), $group->getRelations());
    }
    
    public function testChildrens()
    {
        $child = new stdClass();
        $child->name = 'HolyVirgin';
        $child->assimilation_count = 100;
        $this->group->addChildren($child);
        
        $this->assertEquals(array($child), $this->group->getChildrens());
        $this->assertTrue($this->group->hasChildren());
    }

}