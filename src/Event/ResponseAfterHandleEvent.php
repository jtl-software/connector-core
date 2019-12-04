<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Application\Response;
use Symfony\Contracts\EventDispatcher\Event;

class ResponseAfterHandleEvent extends Event
{
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
        $this->controller = $controller;
        $this->action = $action;
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
}
