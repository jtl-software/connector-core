<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Error;

use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Http\Response;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Method;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ErrorHandler extends AbstractErrorHandler implements LoggerAwareInterface
{
    protected $connectorDir;

    /**
     * @var Application
     */
    protected $eventDispatcher;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var RequestPacket
     */
    protected $requestPacket;

    /**
     * @var integer[]
     */
    protected static $shutdownHandleErrors = [
        E_ERROR,
        E_CORE_ERROR,
        E_USER_ERROR,
        E_RECOVERABLE_ERROR,
        E_COMPILE_ERROR,
        E_PARSE,
    ];

    /**
     * ErrorHandler constructor.
     * @param string $connectorDir
     * @param EventDispatcher $eventDispatcher
     * @param Serializer $serializer
     */
    public function __construct(string $connectorDir, EventDispatcher $eventDispatcher, Serializer $serializer)
    {
        $this->connectorDir = $connectorDir;
        $this->eventDispatcher = $eventDispatcher;
        $this->serializer = $serializer;
        $this->logger = new NullLogger();
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
        $this->eventDispatcher->dispatch($event, Event::createRpcEventName(Event::AFTER));
    }

    /**
     * @return callable
     */
    public function getExceptionHandler(): callable
    {
        return function(\Throwable $ex) {
            return null;
        };
    }

    /**
     * @return callable
     */
    public function getErrorHandler(): callable
    {
        return function ($errno, $errstr, $errfile, $errline, $errcontext) {
            return !in_array($errno, static::$shutdownHandleErrors);
        };
    }

    /**
     * @return callable
     */
    public function getShutdownHandler(): callable
    {
        return function () {
            if (($err = error_get_last())) {
                if (in_array($err['type'], static::$shutdownHandleErrors, true)) {
                    ob_clean();

                    $file = sprintf('...%s', substr($err['file'], strrpos($err['file'], '/') + 1));

                    $error = new Error();
                    $error->setCode($err['type'])
                        ->setData('Shutdown! File: ' . $file . ' - Line: ' . $err['line'])
                        ->setMessage($err['message']);

                    $responsePacket = ResponsePacket::create('unknown')
                        ->setError($error);

                    $rpcMethod = 'unknown.unknown';
                    if(!is_null($this->requestPacket)) {
                        $responsePacket
                            ->setJtlrpc($this->requestPacket->getJtlrpc())
                            ->setId($this->requestPacket->getId());

                        $rpcMethod = $this->requestPacket->getMethod();
                    }

                    $arrayResponse = $responsePacket->toArray($this->serializer);
                    $this->triggerRpcAfterEvent($arrayResponse, $rpcMethod);
                    Response::send($arrayResponse, $this->logger);
                }
            }
        };
    }

    /**
     * @param RequestPacket $requestPacket
     * @return ErrorHandler
     */
    public function setRequestPacket(RequestPacket $requestPacket): ErrorHandler
    {
        $this->requestPacket = $requestPacket;
        return $this;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
