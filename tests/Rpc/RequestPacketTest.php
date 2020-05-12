<?php
namespace Jtl\Connector\Core\Test\Rpc;

use JMS\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class RequestPacketTest
 * @package Jtl\Connector\Core\Test\Rpc
 */
class RequestPacketTest extends TestCase
{
    /**
     * @dataProvider validPacketDataProvider
     *
     * @param array $inputParams
     * @param array $expectedParams
     * @param bool $isValid
     */
    public function testValidPacket(array $inputParams, array $expectedParams, bool $isValid)
    {
        $requestPacket = new RequestPacket();
        $requestPacket->setId($inputParams[0]);
        $requestPacket->setMethod($inputParams[1]);
        $requestPacket->setJtlrpc($inputParams[2]);
        $requestPacket->setParams($inputParams[3]);

        $this->assertSame($isValid, $requestPacket->isValid());
        $this->assertSame($expectedParams[1], $requestPacket->getMethod());
        $this->assertSame($expectedParams[2], $requestPacket->getJtlrpc());
        $this->assertSame($expectedParams[3], $requestPacket->getParams());
    }

    /**
     * @return array
     */
    public function validPacketDataProvider(): array
    {
        return [
            [
                [$id = time(), 'undefined.undefined', '2.0', []],
                [$id, 'undefined.undefined', '2.0', []],
                true
            ],
            [
                ['', 'undefined.undefined', '2.0', ['foo']],
                ['', 'undefined.undefined', '2.0', ['foo']],
                false
            ],
            [
                ['1', '', '2.0', ['foo']],
                ['1', '', '2.0', ['foo']],
                false
            ],
            [
                ['1', 'product.push', '', [[]]],
                ['1', 'product.push', '', [[]]],
                false
            ]
        ];
    }

    /**
     * @dataProvider createFromJtlRpcDataProvider
     *
     * @param string|null $jtlRpcInput
     * @param array $expectedParams
     * @param bool $isValid
     */
    public function testCreateFromJtlrpc(?string $jtlRpcInput, array $expectedParams, bool $isValid)
    {
        $requestPacket = RequestPacket::createFromJtlrpc($jtlRpcInput);


        $this->assertSame($expectedParams[0], $requestPacket->getJtlrpc());
        $this->assertSame($expectedParams[1], $requestPacket->getMethod());
        $this->assertSame($expectedParams[2], $requestPacket->getParams());
        $this->assertSame($isValid, $requestPacket->isValid());
    }

    /**
     * @return array
     */
    public function createFromJtlRpcDataProvider(): array
    {
        return [
            [null, ['2.0', 'undefined.undefined', []], false],
            ['{"jtlrpc":"3.0","method":"jtlmethod"}', ['3.0', 'jtlmethod', []], false],
            ['{}', ['2.0', 'undefined.undefined', []], false],
            ['{"id":"1"}', ['2.0', 'undefined.undefined', []], true],
            ['{"params":[1,2,3]}', ['2.0', 'undefined.undefined', [1, 2, 3]], false]
        ];
    }

    /**
     * @dataProvider createFromJtlRpcDataProvider
     *
     * @param string|null $jtlRpcInput
     * @param array $expectedParams
     * @param bool $isValid
     */
    public function testCreateFromJtlRpcUseAnotherSerializer(?string $jtlRpcInput, array $expectedParams, bool $isValid)
    {
        $jmsSerializer = SerializerBuilder::create();
        $jmsSerializer = $jmsSerializer->build();

        $requestPacket = RequestPacket::createFromJtlrpc($jtlRpcInput, $jmsSerializer);

        $this->assertSame($expectedParams[0], $requestPacket->getJtlrpc());
        $this->assertSame($expectedParams[1], $requestPacket->getMethod());
        $this->assertSame($expectedParams[2], $requestPacket->getParams());
        $this->assertSame($isValid, $requestPacket->isValid());
    }
}
