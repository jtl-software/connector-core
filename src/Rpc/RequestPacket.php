<?php
namespace Jtl\Connector\Core\Rpc;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Serializer\Handler\JsonStringHandler;

/**
 * Rpc Request Packet
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class RequestPacket extends Packet
{
    /**
     * A String containing the name of the method to be invoked.
     * Method names that begin with the word rpc followed by a period character
     * (U+002E or ASCII 46)
     * are reserved for rpc-internal methods and extensions and MUST NOT be used
     * for anything else.
     *
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("method")
     * @Serializer\Accessor(getter="getMethod",setter="setMethod")
     */
    protected $method = 'undefined.undefined';

    /**
     * A Structured value that holds the parameter values to be used during the
     * invocation of the method.
     * This member MAY be omitted.
     *
     * @var array | object
     * @Serializer\Type("Jtl\Connector\Core\Rpc\JsonString")
     * @Serializer\SerializedName("method")
     * @Serializer\Accessor(getter="getMethod",setter="setMethod")
     */
    protected $params = null;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return RequestPacket
     */
    public function setMethod(string $method): RequestPacket
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getParams(): ?string
    {
        return $this->params;
    }

    /**
     * @param string $params
     * @return RequestPacket
     */
    public function setParams(string $params): RequestPacket
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @throws RpcException
     */
    final public function validate()
    {
        $isValid = true;

        // JSON-RPC protocol
        if ($this->getJtlrpc() != "2.0") {
            $isValid = false;
        }

        // A String containing the name of the method to be invoked
        if ($this->getMethod() === '') {
            $isValid = false;
        }

        // An identifier established by the Client that MUST contain a
        // String, Number, or NULL value if included
        if ($this->getId() === '') {
            $isValid = false;
        }

        if (!$isValid) {
            throw new RpcException("Parse error", ErrorCode::PARSE_ERROR);
        }
    }

    /**
     * @param string|null $jtlrpc
     * @return RequestPacket
     */
    public static function build(?string $jtlrpc): RequestPacket
    {
        if ($jtlrpc !== null) {
            $serializer = SerializerBuilder::create()
                ->configureHandlers(function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new JsonStringHandler());
                })
                ->build();

            return $serializer->deserialize($jtlrpc, RequestPacket::class, 'json');
        } else {
            return (new static())->setMethod('undefined.undefined');
        }
    }
}
