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
use \jtl\Connector\Authentication\ITokenLoader;

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
     * Setter token loader
     */
    public function setTokenLoader(ITokenLoader $tokenLoader);

    /**
     * Returns token loader
     */
    public function getTokenLoader();

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

    /**
     * Controller getter
     */
    public function getController();
}
