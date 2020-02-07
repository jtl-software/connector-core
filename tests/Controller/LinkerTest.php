<?php
namespace Jtl\Connector\Core\Tests\Controller;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Controller\LinkerController;
use PHPUnit\Framework\TestCase;

/**
 * Class LinkerTest
 * @package Jtl\Connector\Core\Tests\Controller
 */
class LinkerTest extends TestCase
{
    /**
     *
     */
    public function testClearSuccess()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getLinker->clear')->andReturnTrue();

        $linker = new LinkerController($application);

        $response = $linker->clear(['foo']);
        $this->assertTrue($response);
    }

    /**
     *
     */
    public function testClearFailure()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getLinker->clear')->andReturnFalse();

        $linker = new LinkerController($application);

        $response = $linker->clear(true);
        $this->assertFalse($response);
    }
}