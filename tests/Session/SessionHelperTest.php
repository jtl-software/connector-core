<?php

namespace Jtl\Connector\Core\Test\Session;

use Jtl\Connector\Core\Session\SessionHelper;
use PHPUnit\Framework\TestCase;

class SessionHelperTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        unset($_SESSION);
    }

    public function testHas()
    {
        $helper = new SessionHelper('foo');
        $_SESSION['foo']['bar'] = 'boofar';
        $_SESSION['foo']['you'] = 'yalla';
        $this->assertTrue($helper->has('bar'));
        $this->assertTrue($helper->has('you'));
    }

    public function testHasNot()
    {
        $helper = new SessionHelper('foo');
        $this->assertFalse($helper->has('bar'));
        $this->assertFalse($helper->has('yes'));
    }

    public function testGet()
    {
        $helper = new SessionHelper('foo');
        $_SESSION['foo']['bar'] = 'vaaaaalue';
        $_SESSION['foo']['och'] = 'taataa';
        $this->assertEquals('vaaaaalue', $helper->get('bar'));
        $this->assertEquals('taataa', $helper->get('och'));
    }

    public function testGetDefault()
    {
        $helper = new SessionHelper('foo');
        $this->assertEquals('baras', $helper->get('foo', 'baras'));
        $this->assertEquals('faburus', $helper->get('och', 'faburus'));
    }

    public function testSet()
    {
        $helper = new SessionHelper('yo');
        $helper->set('lo', 'miau');
        $this->assertArrayHasKey('lo', $_SESSION['yo']);
        $this->assertEquals('miau', $_SESSION['yo']['lo']);
    }

    public function testCreateByObjectClass()
    {
        $expectedNamespace = \ZipArchive::class;
        $helper = SessionHelper::createByObjectClass(new \ZipArchive());
        $reflectionClass = new \ReflectionClass($helper);
        $reflectionPropertyNamespace = $reflectionClass->getProperty('namespace');
        $reflectionPropertyNamespace->setAccessible(true);
        $actualNamespace = $reflectionPropertyNamespace->getValue($helper);
        $this->assertEquals($expectedNamespace, $actualNamespace);
    }
}
