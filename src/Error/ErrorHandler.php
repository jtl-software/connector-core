<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Error;

use Jtl\Connector\Core\Http\Response;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Event\EventHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Jtl\Connector\Core\Formatter\ExceptionFormatter;
use Jtl\Connector\Core\Rpc\Method;

class ErrorHandler extends AbstractErrorHandler
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * ErrorHandler constructor.
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->eventDispatcher = $dispatcher;
    }

    /**
     * @param string $jsonString
     * @param string $rpcMethod
     * @throws \Exception
     */
    protected function triggerRpcAfterEvent(string $jsonString, string $rpcMethod)
    {
        if ($this->eventDispatcher !== null) {
            $method = Method::createFromRpcMethod($rpcMethod);
            EventHandler::dispatchRpc(
                $jsonString,
                $this->eventDispatcher,
                $method->getController(),
                $method->getAction(),
                EventHandler::AFTER
            );
        }
    }

    /**
     * @return callable
     */
    public function getExceptionHandler(): callable
    {
        return function (\Throwable $e) {
            $error = new Error();
            $trace = $e->getTrace();
            if (isset($trace[0]['args'][0])) {
                $requestpacket = $trace[0]['args'][0];
            }

            $error->setCode($e->getCode())
                ->setData(ExceptionFormatter::format($e))
                ->setMessage($e->getMessage());

            Logger::write($error->getData(), Logger::ERROR);

            $responsePacket = new ResponsePacket();
            $responsePacket->setError($error)
                ->setId('unknown')
                ->setJtlrpc('2.0');

            $rpcMethod = 'unknown.unknown';
            if (isset($requestpacket) && $requestpacket !== null && is_object($requestpacket) && $requestpacket instanceof RequestPacket) {
                $responsePacket->setId($requestpacket->getId());
                $rpcMethod = $requestpacket->getMethod();
            }

            $serializedResponse = $responsePacket->serialize();
            $this->triggerRpcAfterEvent($serializedResponse, $rpcMethod);
            Response::send($serializedResponse);
        };
    }

    /**
     * @return callable
     */
    public function getErrorHandler(): callable
    {
        return function ($errno, $errstr, $errfile, $errline, $errcontext) {
            $types = [
                E_ERROR => [Logger::ERROR, 'E_ERROR'],
                E_WARNING => [Logger::WARNING, 'E_WARNING'],
                E_PARSE => [Logger::WARNING, 'E_PARSE'],
                E_NOTICE => [Logger::WARNING, 'E_NOTICE'],
                E_CORE_ERROR => [Logger::ERROR, 'E_CORE_ERROR'],
                E_CORE_WARNING => [Logger::WARNING, 'E_CORE_WARNING'],
                E_COMPILE_ERROR => [Logger::ERROR, 'E_COMPILE_ERROR'],
                E_USER_ERROR => [Logger::ERROR, 'E_USER_ERROR'],
                E_USER_WARNING => [Logger::WARNING, 'E_USER_WARNING'],
                E_USER_NOTICE => [Logger::WARNING, 'E_USER_NOTICE'],
                E_STRICT => [Logger::WARNING, 'E_STRICT'],
                E_RECOVERABLE_ERROR => [Logger::ERROR, 'E_RECOVERABLE_ERROR'],
                E_DEPRECATED => [Logger::INFO, 'E_DEPRECATED'],
                E_USER_DEPRECATED => [Logger::INFO, 'E_USER_DEPRECATED'],
            ];

            if (isset($types[$errno])) {
                $err = "(" . $types[$errno][1] . ") File ({$errfile}, {$errline}): {$errstr}";
                Logger::write($err, $types[$errno][0]);
            } else {
                Logger::write("File ({$errfile}, {$errline}): {$errstr}", Logger::ERROR);
            }
        };
    }

    /**
     * @return \Closure
     */
    public function getShutdownHandler(): callable
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

                if (in_array($err['type'], $allowed, true)) {
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
                    ), Logger::ERROR);

                    $responsePacket = new ResponsePacket();
                    $responsePacket->setError($error)
                        ->setId('unknown')
                        ->setJtlrpc('2.0');

                    $serializedResponse = $responsePacket->serialize();
                    $this->triggerRpcAfterEvent($serializedResponse, 'unknown.unknown');
                    Response::send($serializedResponse);
                }
            }
        };
    }
}
