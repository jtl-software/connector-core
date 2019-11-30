<?php
namespace Jtl\Connector\Core\Error;

abstract class AbstractErrorHandler
{
    public function register(): void
    {
        error_reporting(E_ALL);
        //ini_set('display_errors', 1);

        set_exception_handler($this->getExceptionHandler());
        set_error_handler($this->getErrorHandler(), E_ALL);
        register_shutdown_function($this->getShutdownHandler());
    }

    /**
     * @return callable
     */
    abstract public function getExceptionHandler(): callable;

    /**
     * @return callable
     */
    abstract public function getErrorHandler(): callable;

    /**
     * @return callable
     */
    abstract public function getShutdownHandler(): callable;
}