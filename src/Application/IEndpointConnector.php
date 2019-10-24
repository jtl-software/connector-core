<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Application;

use Jtl\Connector\Core\Controller\IController;
use \Jtl\Connector\Core\Rpc\RequestPacket;
use \Jtl\Connector\Core\Mapper\IPrimaryKeyMapper;
use \Jtl\Connector\Core\Authentication\ITokenLoader;
use \Jtl\Connector\Core\Checksum\IChecksumLoader;
use Jtl\Connector\Core\Result\Action;

/**
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
     * @param IPrimaryKeyMapper $mapper
     * @return self
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper): IEndpointConnector;
    
    /**
     * @return IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper;
    
    /**
     * @param ITokenLoader $tokenLoader
     * @return self
     */
    public function setTokenLoader(ITokenLoader $tokenLoader): IEndpointConnector;
    
    /**
     * @return ITokenLoader
     */
    public function getTokenLoader(): ITokenLoader;
    
    /**
     * @param IChecksumLoader $checksumLoader
     * @return self
     */
    public function setChecksumLoader(IChecksumLoader $checksumLoader): IEndpointConnector;
    
    /**
     * @return IChecksumLoader
     */
    public function getChecksumLoader(): IChecksumLoader;
    
    /**
     * Checks whether or not a method can be handled
     *
     * @return bool
     */
    public function canHandle(): bool;
    
    /**
     * Controller handle
     *
     * @param \Jtl\Connector\Core\Rpc\RequestPacket $requestpacket
     */
    public function handle(RequestPacket $requestpacket): Action;
    
    /**
     * Controller getter
     */
    public function getController(): IController;
}
