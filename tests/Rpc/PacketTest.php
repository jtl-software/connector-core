<?php
namespace Jtl\Connector\Core\Tests\Rpc;

use Jtl\Connector\Core\Rpc\Packet;
use Jtl\Connector\Core\Tests\TestCase;

/**
 * Class PacketTest
 * @package Jtl\Connector\Core\Tests\Rpc
 */
class PacketTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testJtlrpcVersion()
    {
        $reflection = new \ReflectionClass(Packet::class);
        $jtlrpc = $reflection->getMethod('getJtlrpc');

        $packet = $this->stubPacket();

        $result = $jtlrpc->invoke($packet);
        $this->assertSame('2.0', $result);
    }

    /**
     * @throws \ReflectionException
     */
    public function testToArray()
    {
        $reflection = new \ReflectionClass(Packet::class);
        $toArray = $reflection->getMethod('toArray');

        $packet = $this->stubPacket();

        $result = $toArray->invoke($packet);

        $this->assertSame(['jtlrpc' => '2.0', 'id' => ''], $result);
    }

    /**
     * @return Packet
     */
    protected function stubPacket(): Packet
    {
        return new class extends Packet
        {
            public function isValid(): bool
            {
                return false;
            }
        };
    }
}