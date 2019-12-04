<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Error;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Http\Response;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Method;

class ErrorHandler extends AbstractErrorHandler
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * ErrorHandler constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @param array $response
     * @param string $rpcMethod
     * @throws \Exception
     */
    protected function triggerRpcAfterEvent(array $response, string $rpcMethod)
    {
        $method = Method::createFromRpcMethod($rpcMethod);
        $event = new RpcEvent($response, $method->getController(), $method->getAction());
        $this->application->getEventDispatcher()->dispatch($event, Event::createRpcEventName(Event::AFTER));
    }

    /**
     * @return callable
     */
    public function getExceptionHandler(): callable
    {
        return function (\Throwable $ex) {
            $trace = $ex->getTrace();
            $requestPacket = null;
            if (isset($trace[0]['args'][0])) {
                $requestPacket = $trace[0]['args'][0];
            }

            $error = (new Error())
                ->setCode($ex->getCode())
                ->setData(Logger::createExceptionInfos($ex, true))
                ->setMessage($ex->getMessage());

            Logger::writeException($ex);

            $responsePacket = (new ResponsePacket())
                ->setError($error)
                ->setId('unknown');

            $rpcMethod = 'unknown.unknown';
            if ($requestPacket !== null && is_object($requestPacket) && $requestPacket instanceof RequestPacket) {
                $responsePacket->setId($requestPacket->getId());
                $rpcMethod = $requestPacket->getMethod();
            }

            $arrayResponse = $responsePacket->toArray($this->application->getSerializer());
            $this->triggerRpcAfterEvent($arrayResponse, $rpcMethod);
            Response::send($arrayResponse);
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

                    $responsePacket = (new ResponsePacket())
                        ->setError($error)
                        ->setId('unknown');

                    $arrayResponse = $responsePacket->toArray($this->application->getSerializer());
                    $this->triggerRpcAfterEvent($arrayResponse, 'unknown.unknown');
                    Response::send($arrayResponse);
                }
            }
        };
    }
}
