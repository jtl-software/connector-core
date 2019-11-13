<?php
namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Application\Application;

abstract class AbstractController
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * AbstractController constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->init();
    }

    protected function init()
    {
    }
}
