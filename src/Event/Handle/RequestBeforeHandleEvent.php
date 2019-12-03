<?php
namespace Jtl\Connector\Core\Event\Handle;

use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class RequestBeforeHandleEvent extends Event implements EventInterface
{
    const EVENT_NAME = 'request.before.handle';

    /**
     * @var Request
     */
    protected $request;

    /**
     * RequestBeforeHandleEvent constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return static::EVENT_NAME;
    }
}
