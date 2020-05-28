<?php
namespace Jtl\Connector\Core\Error;

abstract class AbstractErrorHandler
{
    public function register(): void
    {
        $exceptionHandler = $this->getExceptionHandler();
        if(!is_null($exceptionHandler)) {
            set_exception_handler($exceptionHandler);
        }

        $errorHandler = $this->getErrorHandler();
        if(!is_null($errorHandler)) {
            set_error_handler($errorHandler);
        }

        $shutDownHandler = $this->getShutdownHandler();
        if(!is_null($shutDownHandler)) {
            register_shutdown_function($shutDownHandler);
        }
    }

    /**
     * @return callable
     */
    abstract public function getExceptionHandler(): ?callable;

    /**
     * @return callable
     */
    abstract public function getErrorHandler(): ?callable;

    /**
     * @return callable
     */
    abstract public function getShutdownHandler(): ?callable;
}
