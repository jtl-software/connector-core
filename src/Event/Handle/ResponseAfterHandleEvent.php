<?php
namespace Jtl\Connector\Core\Event\Handle;

use Jtl\Connector\Core\Application\Response;
use Jtl\Connector\Core\Event\AbstractEvent;

class ResponseAfterHandleEvent extends AbstractEvent
{
    const EVENT_NAME = 'response.after.handle';

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var Response
     */
    protected $response = [];

    /**
     * ResponseAfterHandleEvent constructor.
     * @param string $controller
     * @param string $action
     * @param Response $response
     */
    public function __construct(string $controller, string $action, Response $response)
    {
        $this->response = $response;
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
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return static::EVENT_NAME;
    }
}
