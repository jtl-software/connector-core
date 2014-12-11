<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */
namespace jtl\Connector\Application;

use \jtl\Connector\Core\Rpc\RequestPacket;

/**
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface IEndpointConnector
{
    /**
     * Checks whether or not a method can be handled
     */
    public function canHandle();

    /**
     * Controller handle
     * 
     * @param \jtl\Connector\Core\Rpc\RequestPacket $requestpacket
     */
    public function handle(RequestPacket $requestpacket);
}