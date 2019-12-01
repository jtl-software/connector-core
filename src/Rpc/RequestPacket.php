<?php
namespace Jtl\Connector\Core\Rpc;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Exception\RpcException;
use JMS\Serializer\Serializer as JmsSerializer;
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
     * @var mixed[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("params")
     * @Serializer\Accessor(getter="getParams",setter="setParams")
     */
    protected $params = [];

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
     * @return mixed[]
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param mixed[] $params
     * @return RequestPacket
     */
    public function setParams(array $params): RequestPacket
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return boolean
     */
    final public function isValid(): bool
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

        return $isValid;
    }

    /**
     * @param string|null $jtlrpc
     * @param JmsSerializer $serializer
     * @return RequestPacket
     */
    public static function create(?string $jtlrpc, JmsSerializer $serializer = null): RequestPacket
    {
        if(is_null($serializer)) {
            $serializer = SerializerBuilder::getInstance()->build();
        }

        if ($jtlrpc !== null) {
            return $serializer->deserialize($jtlrpc, RequestPacket::class, 'json');
        } else {
            return (new static())->setMethod('undefined.undefined');
        }
    }
}
