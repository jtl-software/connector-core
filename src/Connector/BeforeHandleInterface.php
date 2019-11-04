<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Rpc\RequestPacket;

/**
 * Interface BeforeHandleInterface
 * @package Jtl\Connector\Core\Connector
 */
interface BeforeHandleInterface
{
    /**
     * @param RequestPacket $requestPacket
     */
    public function beforeHandle(RequestPacket $requestPacket): void;
}