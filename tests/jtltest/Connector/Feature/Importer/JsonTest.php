<?php

require_once 'vfsStream/vfsStream.php';

use \jtl\Connector\Feature\Importer\Json as JsonImporter;

class JsonTest extends PHPUnit_Framework_TestCase
{

    protected $features = array(
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
    protected $json;
    protected $root;
    protected $file;

    public function setUp()
    {
        //Filesystem Mock
        vfsStreamWrapper::register();
        $this->root = new vfsStreamDirectory('phpUnitTest');
        $this->file = new vfsStreamFile('testfile.json');
        $this->file->setContent(json_encode($this->features));
        vfsStreamWrapper::setRoot($this->root);
        $this->root->addChild($this->file);

        //json importer
        $this->json = new JsonImporter(vfsStream::url('phpUnitTest/testfile.json'));
    }

    public function testDefaults()
    {
        $root = vfsStreamWrapper::getRoot();
        $this->assertTrue($root->getName() == 'phpUnitTest');
        $this->assertTrue($root->hasChild('testfile.json'));
    }

    public function testLoad()
    {
        $this->assertEquals($this->features, $this->json->load());
    }

    /**
     * @expectedException jtl\Connector\Feature\Exception\Importer
     */
    public function testLoadException()
    {
        $this->root->removeChild('testfile.json');
        $this->json->load();
    }

}