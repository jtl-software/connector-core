<?php
namespace Jtl\Connector\Core\Event\Request;

use Jtl\Connector\Core\Model\DataModel;
use Symfony\Contracts\EventDispatcher\Event;

class RequestBeforeHandleEvent extends Event
{
    const EVENT_NAME = 'request.before.handle';

    /**
     * @var string
     */
    protected $controller;

    /** @var string */
    protected $action;

    /** @var DataModel[] */
    protected $params = [];

    /**
     * RequestBeforeHandleEvent constructor.
     * @param string $controller
     * @param string $action
     * @param DataModel ...$params
     */
    public function __construct(string $controller, string $action, DataModel ...$params)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return DataModel[]
     */
    public function getParams(): array
    {
        return $this->params;
    }
}