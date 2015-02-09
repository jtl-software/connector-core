<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */
namespace jtl\Connector\Application;

use \jtl\Connector\Core\Rpc\RequestPacket;
use \jtl\Connector\Core\Config\Config;
use \jtl\Connector\Mapper\IPrimaryKeyMapper;

/**
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface IEndpointConnector
{
    /**
     * Main initialize method
     */
    public function initialize();

    /**
     * Setter primary key mapper
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper);

    /**
     * Returns primary key mapper
     */
    public function getPrimaryKeyMapper();

    /**
     * Setter connector config
     */
    public function setConfig(Config $config);

    /**
     * Returns the config
     */
    public function getConfig();

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
