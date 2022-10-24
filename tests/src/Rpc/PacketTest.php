<?php
namespace Jtl\Connector\Core\Test\Rpc;

use Faker\Provider\Uuid;
use Jtl\Connector\Core\Rpc\Packet;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class PacketTest
 * @package Jtl\Connector\Core\Test\Rpc
 */
class PacketTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testToArray()
    {
        $jtlRpc = \mt_rand(0, 1) === 1 ? Uuid::uuid() : '';
        $id     = \mt_rand(0, 1) === 1 ? Uuid::uuid() : '';
        $packet = $this->stubPacket()->setJtlrpc($jtlRpc)->setId($id);
        $result = $this->invokeMethodFromObject($packet, 'toArray');
        $this->assertSame(['jtlrpc' => $jtlRpc, 'id' => $id], $result);
    }

    /**
     * @param bool $isValid
     * @return Packet
     */
    protected function stubPacket(): Packet
    {
        return new class extends Packet {
            /**
             * @return boolean
             */
            public function isValid(): bool
            {
                return false;
            }
        };
    }
}
