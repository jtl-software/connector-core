<?php
namespace Jtl\Connector\Test\Core\Serializer\Handler;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Serializer\Handler\IdentityHandler;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class IdentityHandlerTest
 * @package Jtl\Connector\Test\Core\Serializer\Handler
 */
class IdentityHandlerTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSerializeEntityMethod()
    {
        $endpointId = $this->createEndpointId();
        $hostId = $this->createHostId();

        $identity = new Identity($endpointId, $hostId);

        $identityHandler = new IdentityHandler();
        $result = $identityHandler->serializeIdentity(new JsonSerializationVisitor(), $identity, [],
            new SerializationContext());

        $this->assertSame([$endpointId, $hostId], $result);
    }

    /**
     * @throws \Exception
     */
    public function testDeserializeEntityMethod()
    {
        $endpointId = $this->createEndpointId();
        $hostId = $this->createHostId();

        $identityHandler = new IdentityHandler();

        $identity = new Identity($endpointId, $hostId);

        $visitor = new JsonDeserializationVisitor();
        $visitor->setCurrentObject($identity);

        $result = $identityHandler->deserializeIdentity($visitor, [$endpointId, $hostId], [],
            new DeserializationContext());

        $this->assertEquals($result, $identity);
    }

    /**
     * @dataProvider identityDataProvider
     * @param IdentityHandler $identityHandler
     * @param array $identityArray
     * @throws \Exception
     */
    public function testDeserializeEntityMultipleMethod(IdentityHandler $identityHandler, array $identityArray)
    {
        $identity = new Identity($identityArray[0], $identityArray[1]);

        $visitor = new JsonDeserializationVisitor();
        $visitor->setCurrentObject($identity);

        $result = $identityHandler->deserializeIdentity($visitor, $identityArray, [],
            new DeserializationContext());

        $this->assertEquals($identity, $result);
    }

    /**
     * @return array
     */
    public function identityDataProvider()
    {
        $identityHandler = new IdentityHandler();

        return [
            [$identityHandler, ["1", 1]],
            [$identityHandler, ["2", 1]],
            [$identityHandler, ["3", 2]],
            [$identityHandler, ["1", 2]]
        ];
    }
}