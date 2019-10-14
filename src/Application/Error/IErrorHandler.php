<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Application\Error;

use Symfony\Component\EventDispatcher\EventDispatcher;

interface IErrorHandler
{
    /**
     * @param callable $func
     * @return mixed
     */
    public function setExceptionHandler(callable $func);
    
    /**
     * @param callable $func
     * @return mixed
     */
    public function setErrorHandler(callable $func);
    
    /**
     * @param callable $func
     * @return mixed
     */
    public function setShutdownHandler(callable $func);
    
    /**
     * @param EventDispatcher $dispatcher
     * @return mixed
     */
    public function setEventDispatcher(EventDispatcher $dispatcher);
}
