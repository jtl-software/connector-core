<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Error;

use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Http\JsonResponse;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;

class ErrorHandler extends AbstractErrorHandler
{
    /**
     * @var RequestPacket
     */
    protected $requestPacket;

    /**
     * @var JsonResponse
     */
    protected $response;

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
     * @param JsonResponse $response
     */
    public function __construct(JsonResponse $response)
    {
        $this->response = $response;
    }

    /**
     * @return callable
     */
    public function getExceptionHandler(): callable
    {
        return function (\Throwable $ex) {
            return null;
        };
    }

    /**
     * @return callable
     */
    public function getErrorHandler(): callable
    {
        return function ($errno, $errstr, $errfile = "", $errline = -1, $errcontext = null) {
            return !\in_array($errno, static::$shutdownHandleErrors, true);
        };
    }

    /**
     * @return callable
     */
    public function getShutdownHandler(): callable
    {
        return function () {
            if (($err = \error_get_last())) {
                if (\in_array($err['type'], static::$shutdownHandleErrors, true)) {
                    \ob_clean();

                    $file = \sprintf('...%s', \substr($err['file'], \strrpos($err['file'], '/')));

                    $error = new Error();
                    $error->setCode($err['type'])
                        ->setData('Shutdown! File: ' . $file . ' - Line: ' . $err['line'])
                        ->setMessage($err['message']);

                    $requestPacket = RequestPacket::create('unknown')->setMethod('unknown.unknown');
                    if (!\is_null($this->requestPacket)) {
                        $requestPacket = $this->requestPacket;
                    }

                    $responsePacket = ResponsePacket::create($requestPacket->getId(), $requestPacket->getJtlrpc())
                        ->setError($error);

                    $this->response->prepareAndSend($requestPacket, $responsePacket);
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
}
