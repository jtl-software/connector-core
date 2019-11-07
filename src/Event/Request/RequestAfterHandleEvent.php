<?php
namespace Jtl\Connector\Core\Event\Request;

use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Result\Action;
use Symfony\Contracts\EventDispatcher\Event;

class RequestAfterHandleEvent extends Event
{
    const EVENT_NAME = 'request.after.handle';

    /**
     * @var string
     */
    protected $controller;

    /** @var string */
    protected $action;

    /** @var mixed[] */
    protected $result = [];

    /**
     * RequestBeforeHandleEvent constructor.
     * @param string $controller
     * @param string $action
     * @param Action $result
     */
    public function __construct(string $controller, string $action, Action $result)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->result = $result;
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
     * @return Action
     */
    public function getResult(): Action
    {
        return $this->result;
    }
}