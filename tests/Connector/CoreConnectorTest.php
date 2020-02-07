<?php
namespace Jtl\Connector\Test\Core\Connector;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\CoreConnector;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class CoreConnectorTest
 * @package Jtl\Connector\Test\Core\Connector
 */
class CoreConnectorTest extends TestCase
{
    /**
     *
     */
    public function testInitialization()
    {
        $primaryKeyMapperInterface = \Mockery::mock(PrimaryKeyMapperInterface::class);
        $tokenValidatorInterface = \Mockery::mock(TokenValidatorInterface::class);

        $coreConnector = new CoreConnector($primaryKeyMapperInterface, $tokenValidatorInterface);

        $this->assertSame($primaryKeyMapperInterface, $coreConnector->getPrimaryKeyMapper());
        $this->assertSame($tokenValidatorInterface, $coreConnector->getTokenValidator());
        $this->assertSame('Jtl\Connector\Core\Controller', $coreConnector->getControllerNamespace());

        $return = $coreConnector->initialize(\Mockery::mock(Application::class));
        $this->assertNull($return);;
    }
}