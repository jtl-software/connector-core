<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Base
 */

namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Utilities\RpcMethod;
use Jtl\Connector\Core\Mapper\IPrimaryKeyMapper;
use Jtl\Connector\Core\Result\Action;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class CoreConnector implements ConnectorInterface, HandleRequestInterface
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


    public function initialize(Application $application)
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
     * @return string
     */
    public function getControllerNamespace(): string
    {
        return $this->controllerNamespace;
    }

    /**
     * @param Application $application
     * @param string $controller
     * @param string $action
     * @param DataModel ...$params
     * @return Action
     */
    public function handle(Application $application, string $controller, string $action, DataModel ...$params): Action
    {
        $controllerName = sprintf('%s\%s', $this->getControllerNamespace(), $controller);
        $controller = new $controllerName($application);

        $result = $controller->{$action}($params);
        if(!$result instanceof Action) {
            $result = (new Action())->setResult($result);
        }

        return $result;
    }
}
