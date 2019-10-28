<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Base
 */

namespace Jtl\Connector\Core\Base;

use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Checksum\ChecksumInterface;
use Jtl\Connector\Core\Checksum\IChecksumLoader;
use Jtl\Connector\Core\Controller\IController;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Application\IEndpointConnector;
use Jtl\Connector\Core\Utilities\Singleton;
use Jtl\Connector\Core\Utilities\RpcMethod;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Mapper\IPrimaryKeyMapper;
use Jtl\Connector\Core\Result\Action;
use Symfony\Component\EventDispatcher\EventDispatcher;

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
    /** @var ITokenValidator */
    protected $tokenValidator;
    /** @var EventDispatcher */
    protected $eventDispatcher;
    /** @var Method */
    protected $method;
    /** @var bool */
    protected $useSuperGlobals = true;
    /** @var string */
    protected $modelNamespace = 'Jtl\Connector\Core\Model';
    
    public function initialize()
    {
        
    }
    
    /**
     * Setter primary key mapper
     *
     * @param \Jtl\Connector\Core\Mapper\IPrimaryKeyMapper $mapper
     * @return \Jtl\Connector\Core\Base\Connector
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper): IEndpointConnector
    {
        $this->keyMapper = $mapper;
        
        return $this;
    }

    /**
     * Returns primary key mapper
     *
     * @return IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper
    {
        return $this->keyMapper;
    }

    /**
     * Setter token validator
     *
     * @param ITokenValidator $tokenValidator
     * @return Connector
     */
    public function setTokenValidator(ITokenValidator $tokenValidator): IEndpointConnector
    {
        $this->tokenValidator = $tokenValidator;
        
        return $this;
    }
    
    /**
     * @return ITokenValidator
     */
    public function getTokenValidator(): ITokenValidator
    {
        return $this->tokenValidator;
    }

    /**
     * @param EventDispatcher $eventDispatcher
     * @return IEndpointConnector
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
     * @param \Jtl\Connector\Core\Rpc\Method $method
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
     * @return \Jtl\Connector\Core\Rpc\Method
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
            throw new \InvalidArgumentException(sprintf('Wrong Namespace (%s) syntax. Example: Jtl\Connector\Core\Model',
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
     * @see \Jtl\Connector\Core\Application\IEndpointConnector::canHandle()
     */
    public function canHandle(): bool
    {
        $controller = RpcMethod::buildController($this->getMethod()->getController());
        
        $class = "\\Jtl\\Connector\\Core\\Controller\\{$controller}";
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
     * @see \Jtl\Connector\Core\Application\IEndpointConnector::handle()
     */
    public function handle(RequestPacket $requestpacket): Action
    {
        $this->controller->setMethod($this->getMethod());
        
        return $this->controller->{$this->action}($requestpacket->getParams());
    }
    
    /**
     * @see \Jtl\Connector\Core\Application\IEndpointConnector::getController()
     */
    public function getController(): IController
    {
        return $this->controller;
    }
}
