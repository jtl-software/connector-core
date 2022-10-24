<?php

namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Application\Request;
use Symfony\Contracts\EventDispatcher\Event;

class RequestEvent extends Event
{
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
}
