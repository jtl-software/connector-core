<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */

namespace jtl\Connector\Base;

use jtl\Connector\Authentication\ITokenValidator;
use jtl\Connector\Core\Controller\IController;
use \jtl\Connector\Core\Rpc\RequestPacket;
use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Connector\Core\Utilities\Singleton;
use \jtl\Connector\Core\Utilities\RpcMethod;
use \jtl\Connector\Core\Rpc\Method;
use \jtl\Connector\Mapper\IPrimaryKeyMapper;
use \jtl\Connector\Authentication\ITokenLoader;
use \jtl\Connector\Checksum\IChecksumLoader;
use jtl\Connector\Result\Action;
use \Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Connector extends Singleton implements IEndpointConnector
{
    /** @var IController */
    protected $controller;
    /** @var IPrimaryKeyMapper */
    protected $keyMapper;
    /** @var ITokenLoader */
    protected $tokenLoader;
    /** @var ITokenValidator */
    protected $tokenValidator;
    /** @var IChecksumLoader */
    protected $checksumLoader;
    /** @var EventDispatcher */
    protected $eventDispatcher;
    /** @var Method */
    protected $method;
    /** @var bool */
    protected $useSuperGlobals = true;
    /** @var string */
    protected $modelNamespace = 'jtl\Connector\Model';
    
    public function initialize()
    {
        
    }
    
    /**
     * Setter primary key mapper
     *
     * @param \jtl\Connector\Mapper\IPrimaryKeyMapper $mapper
     * @return \jtl\Connector\Base\Connector
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper): IEndpointConnector
    {
        $this->keyMapper = $mapper;
        
        return $this;
    }
    
    /**
     * Returns primary key mapper
     *
     * @return \jtl\Connector\Authentication\ITokenLoader
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper
    {
        return $this->keyMapper;
    }
    
    /**
     * Setter token loader
     *
     * @param \jtl\Connector\Authentication\ITokenLoader $tokenLoader
     * @return Connector
     */
    public function setTokenLoader(ITokenLoader $tokenLoader): IEndpointConnector
    {
        $this->tokenLoader = $tokenLoader;
        
        return $this;
    }
    
    /**
     * Returns token loader
     *
     * @return \jtl\Connector\Authentication\ITokenLoader
     */
    public function getTokenLoader(): ITokenLoader
    {
        return $this->tokenLoader;
    }
    
    /**
     * Setter token validator
     *
     * @param \jtl\Connector\Authentication\ITokenValidator $tokenValidator
     * @return Connector
     */
    protected function setTokenValidator(ITokenValidator $tokenValidator): IEndpointConnector
    {
        $this->tokenValidator = $tokenValidator;
        
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Authentication\ITokenValidator
     */
    public function getTokenValidator(): ?ITokenValidator
    {
        return $this->tokenValidator;
    }
    
    /**
     * Setter checksum loader
     *
     * @param \jtl\Connector\Checksum\IChecksumLoader $checksumLoader
     * @return Connector
     */
    public function setChecksumLoader(IChecksumLoader $checksumLoader): IEndpointConnector
    {
        $this->checksumLoader = $checksumLoader;
        
        return $this;
    }
    
    /**
     * Returns checksum loader
     *
     * @return \jtl\Connector\Checksum\IChecksumLoader
     */
    public function getChecksumLoader(): IChecksumLoader
    {
        return $this->checksumLoader;
    }
    
    /**
     * Setter checksum loader
     *
     * @param Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     * @return Connector
     */
    public function setEventDispatcher(EventDispatcher $eventDispatcher): IEndpointConnector
    {
        $this->eventDispatcher = $eventDispatcher;
        
        return $this;
    }
    
    /**
     * @return EventDispatcher
     */
    public function getEventDispatcher(): EventDispatcher
    {
        return $this->eventDispatcher;
    }
    
    /**
     * Method Setter
     *
     * @param \jtl\Connector\Core\Rpc\Method $method
     * @return Connector
     */
    public function setMethod(Method $method): IEndpointConnector
    {
        $this->method = $method;
        
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Connector\Core\Rpc\Method
     */
    public function getMethod(): Method
    {
        return $this->method;
    }
    
    /**
     * @return boolean
     */
    public function getUseSuperGlobals(): bool
    {
        return $this->useSuperGlobals;
    }
    
    /**
     * Method Setter
     *
     * @param string $modelNamespace
     * @return Connector
     */
    public function setModelNamespace(string $modelNamespace): IEndpointConnector
    {
        if (!is_string($modelNamespace) || $modelNamespace[strlen($modelNamespace) - 1] == '\\' || $modelNamespace[0] == '\\') {
            throw new \InvalidArgumentException(sprintf('Wrong Namespace (%s) syntax. Example: jtl\Connector\Model',
                $modelNamespace));
        }
        
        $this->modelNamespace = $modelNamespace;
        
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return string
     */
    public function getModelNamespace(): string
    {
        return $this->modelNamespace;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Application\IEndpointConnector::canHandle()
     */
    public function canHandle(): bool
    {
        $controller = RpcMethod::buildController($this->getMethod()->getController());
        
        $class = "\\jtl\\Connector\\Controller\\{$controller}";
        if (class_exists($class)) {
            $this->controller = $class::getInstance();
            $this->action = $this->getMethod()->getAction();
            
            return method_exists($this->controller, $this->action);
        }
        
        return false;
    }
    
    /**
     * @param RequestPacket $requestpacket
     * @return Action
     * @see \jtl\Connector\Application\IEndpointConnector::handle()
     */
    public function handle(RequestPacket $requestpacket): Action
    {
        $this->controller->setMethod($this->getMethod());
        
        return $this->controller->{$this->action}($requestpacket->getParams());
    }
    
    /**
     * @see \jtl\Connector\Application\IEndpointConnector::getController()
     */
    public function getController(): IController
    {
        return $this->controller;
    }
}
