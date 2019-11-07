<?php
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Result\Action;
use Jtl\Connector\Core\Rpc\RequestPacket;

interface HandleRequestInterface
{
    /**
     * @param Application $application
     * @param string $controller
     * @param string $action
     * @param DataModel ...$params
     * @return Action
     */
    public function handle(Application $application, string $controller, string $action, DataModel ...$params): Action;
}