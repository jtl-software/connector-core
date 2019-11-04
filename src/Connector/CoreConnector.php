<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Base
 */
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Error\ErrorCodesInterface;
use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Controller\IController;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Rpc\RequestPacket;
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
class CoreConnector implements ConnectorInterface
{
    /**
     * @var IPrimaryKeyMapper
     */
    protected $primaryKeyMapper;

    /**
     * @var ITokenValidator
     */
    protected $tokenValidator;

    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var Method
     */
    protected $method;

    /**
     * @var string
     */
    protected $controllerNamespace = 'Jtl\Connector\Core\Controller';

    /**
     * CoreConnector constructor.
     * @param IPrimaryKeyMapper $primaryKeyMapper
     * @param ITokenValidator $tokenValidator
     */
    public function __construct(IPrimaryKeyMapper $primaryKeyMapper, ITokenValidator $tokenValidator)
    {
        $this->primaryKeyMapper = $primaryKeyMapper;
        $this->tokenValidator = $tokenValidator;
    }


    public function initialize()
    {
    }

    /**
     * Returns primary key mapper
     *
     * @return IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper(): IPrimaryKeyMapper
    {
        return $this->primaryKeyMapper;
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
     * @return ConnectorInterface
     */
    public function setEventDispatcher(EventDispatcher $eventDispatcher): ConnectorInterface
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
     * @return string
     */
    public function getControllerNamespace(): string
    {
        return $this->controllerNamespace;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Application $application
     * @return Action
     * @throws RpcException
     */
    public function handle(RequestPacket $requestPacket, Application $application): Action
    {
        $rpcMethod = RpcMethod::splitMethod($requestPacket->getMethod());

        $controllerName = sprintf('%s\%s', $this->getControllerNamespace(), RpcMethod::buildController($rpcMethod));
        $actionName = $rpcMethod->getAction();

        $this->validateRequest($controllerName,$actionName);

        $controller = new $controllerName($application);

        $action = new Action();
        try {
            $result = $controller->{$actionName}($requestPacket->getParams());
            $action->setResult($result);
        } catch(\Exception $exception){
            $action->setError($exception->getMessage());
        }

        return $action;
    }

    /**
     * @param $controllerName
     * @param $actionName
     * @return bool
     * @throws RpcException
     */
    private function validateRequest($controllerName,$actionName) : bool
    {
        if(class_exists($controllerName) === false){
            throw new RpcException(
                sprintf("Controller '%s' does not exists.", $controllerName),
                ErrorCodesInterface::CONTROLLER_DOES_NOT_EXISTS
            );
        }

        if(is_callable([$controllerName, $actionName]) === false){
            throw new RpcException(
                sprintf("Action '%s' not found in controller '%s'", $actionName, $controllerName),
                ErrorCodesInterface::ACTION_NOT_FOUND_IN_CONTROLLER
            );
        }

        return true;
    }

}
