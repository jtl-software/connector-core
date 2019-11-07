<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Mapper\IPrimaryKeyMapper;
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
    public function initialize(Application $application);
    
    /**
     * @return IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper;

    /**
     * @return ITokenValidator
     */
    public function getTokenValidator(): ITokenValidator;

    /**
     * @return string
     */
    public function getControllerNamespace(): string;
}
