<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Controller\IController;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Mapper\IPrimaryKeyMapper;
use Jtl\Connector\Core\Result\Action;
use Jtl\Connector\Core\Application\Application;

/**
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface ConnectorInterface
{
    /**
     * Main initialize method
     */
    public function initialize();
    
    /**
     * @return IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper;


    /**
     * @return ITokenValidator
     */
    public function getTokenValidator(): ITokenValidator;
}
