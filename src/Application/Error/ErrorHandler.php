<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Application\Error;

use Jtl\Connector\Core\Http\Response;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Utilities\RpcMethod;
use Jtl\Connector\Core\Event\EventHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Jtl\Connector\Core\Formatter\ExceptionFormatter;

class ErrorHandler implements IErrorHandler
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;
    
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        // Exception
        $this->setExceptionHandler($this->getExceptionHandler());
        
        // Error
        $this->setErrorHandler($this->getErrorHandler());
        
        // Shutdown
        $this->setShutdownHandler($this->getShutdownHandler());
    }
    
    /**
     * @param \stdClass $data
     * @param string $method
     */
    protected function triggerRpcAfterEvent(\stdClass $data, string $method)
    {
        if ($this->eventDispatcher !== null) {
            $method = RpcMethod::splitMethod($method);
            EventHandler::dispatchRpc($data, $this->eventDispatcher, $method->getController(), $method->getAction(),
                EventHandler::AFTER);
        }
    }
    
    /**
     * @param callable $func
     */
    public function setExceptionHandler(callable $func): void
    {
        set_exception_handler($func);
    }
    
    /**
     * @return \Closure
     */
    public function getExceptionHandler()
    {
        return function ($e) {
            $error = new Error();
            if (self::isThrowable($e)) {
                $trace = $e->getTrace();
                if (isset($trace[0]['args'][0])) {
                    $requestpacket = $trace[0]['args'][0];
                }
                
                $error->setCode($e->getCode())
                    ->setData(ExceptionFormatter::format($e))
                    ->setMessage($e->getMessage());
                
                Logger::write($error->getData(), Logger::ERROR, 'global');
            }
            
            $responsepacket = new ResponsePacket();
            $responsepacket->setError($error)
                ->setId('unknown')
                ->setJtlrpc('2.0');
            
            $method = 'unknown.unknown';
            if (isset($requestpacket) && $requestpacket !== null && is_object($requestpacket) && $requestpacket instanceof RequestPacket) {
                $responsepacket->setId($requestpacket->getId());
                $method = $requestpacket->getMethod();
            }
            
            $this->triggerRpcAfterEvent($responsepacket->getPublic(), $method);
            Response::send($responsepacket);
        };
    }
    
    /**
     * @param callable $func
     */
    public function setErrorHandler(callable $func): void
    {
        set_error_handler($func, E_ALL);
    }
    
    /**
     * @return \Closure
     */
    public function getErrorHandler()
    {
        return function ($errno, $errstr, $errfile, $errline, $errcontext) {
            $types = [
                E_ERROR             => [Logger::ERROR, 'E_ERROR'],
                E_WARNING           => [Logger::WARNING, 'E_WARNING'],
                E_PARSE             => [Logger::WARNING, 'E_PARSE'],
                E_NOTICE            => [Logger::NOTICE, 'E_NOTICE'],
                E_CORE_ERROR        => [Logger::ERROR, 'E_CORE_ERROR'],
                E_CORE_WARNING      => [Logger::WARNING, 'E_CORE_WARNING'],
                E_COMPILE_ERROR     => [Logger::ERROR, 'E_COMPILE_ERROR'],
                E_USER_ERROR        => [Logger::ERROR, 'E_USER_ERROR'],
                E_USER_WARNING      => [Logger::WARNING, 'E_USER_WARNING'],
                E_USER_NOTICE       => [Logger::NOTICE, 'E_USER_NOTICE'],
                E_STRICT            => [Logger::NOTICE, 'E_STRICT'],
                E_RECOVERABLE_ERROR => [Logger::ERROR, 'E_RECOVERABLE_ERROR'],
                E_DEPRECATED        => [Logger::INFO, 'E_DEPRECATED'],
                E_USER_DEPRECATED   => [Logger::INFO, 'E_USER_DEPRECATED'],
            ];
            
            if (isset($types[$errno])) {
                $err = "(" . $types[$errno][1] . ") File ({$errfile}, {$errline}): {$errstr}";
                Logger::write($err, $types[$errno][0], 'global');
            } else {
                Logger::write("File ({$errfile}, {$errline}): {$errstr}", Logger::ERROR, 'global');
            }
        };
    }
    
    /**
     * @param callable $func
     */
    public function setShutdownHandler(callable $func): void
    {
        register_shutdown_function($func);
    }
    
    /**
     * @return \Closure
     */
    public function getShutdownHandler()
    {
        return function () {
            if (($err = error_get_last())) {
                $allowed = [
                    E_ERROR,
                    E_CORE_ERROR,
                    E_USER_ERROR,
                    E_RECOVERABLE_ERROR,
                    E_COMPILE_ERROR,
                    E_PARSE,
                ];
                
                if (in_array($err['type'], $allowed)) {
                    ob_clean();
                    
                    $error = new Error();
                    $error->setCode($err['type'])
                        ->setData('Shutdown! File: ' . $err['file'] . ' - Line: ' . $err['line'])
                        ->setMessage($err['message']);
                    
                    Logger::write(sprintf(
                        '%s - Type: %s - Message: %s',
                        $error->getData(),
                        $err['type'],
                        $error->getMessage()
                    ), Logger::ERROR, 'global');
                    
                    $responsepacket = new ResponsePacket();
                    $responsepacket->setError($error)
                        ->setId('unknown')
                        ->setJtlrpc('2.0');
                    
                    $this->triggerRpcAfterEvent($responsepacket->getPublic(), 'unknown.unknown');
                    
                    Response::send($responsepacket);
                }
            }
        };
    }
    
    /**
     * @param EventDispatcher $dispatcher
     * @return ErrorHandler
     */
    public function setEventDispatcher(EventDispatcher $dispatcher): ErrorHandler
    {
        $this->eventDispatcher = $dispatcher;
        
        return $this;
    }
    
    /**
     * @param mixed $e
     * @return bool
     */
    public static function isThrowable($e): bool
    {
        return version_compare(phpversion(), '7.0.0', '<') ?
            ($e instanceof \Exception) :
            ($e instanceof \Throwable);
    }
}
