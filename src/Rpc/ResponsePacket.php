<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Rpc
 */
namespace Jtl\Connector\Core\Rpc;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Serializer\SerializerBuilder;

/**
 * Rpc Response Packet
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class ResponsePacket extends Packet
{
    /**
     * This member is REQUIRED on success.
     * This member MUST NOT exist if there was an error invoking the method.
     * The value of this member is determined by the method invoked on the
     * Server.
     *
     * @var integer | array | string | NULL
     */
    protected $result;

    /**
     * This member is REQUIRED on error This member MUST NOT exist if there was
     * no error triggered during invocation.
     * The value for this member MUST be an Object as defined in section 5.1.
     *
     * @var Error
     * @Serializer\Type("Jtl\Connector\Core\Rpc\Error")
     */
    protected $error;

    /**
     * Getter for $result
     *
     * @return integer | array | string | NULL
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Setter for $result
     *
     * @param integer | array | string | NULL $result
     * @return Packet
     */
    public function setResult($result): ResponsePacket
    {
        $this->result = $result;
        return $this;
    }

    /**
     * Getter for $error
     *
     * @return Error
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * Setter for $error
     *
     * @param Error $error
     * @return Packet
     */
    public function setError(Error $error): ResponsePacket
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Validates a Rpc Response Packet
     *
     * @throws RpcException
     */
    final public function validate()
    {
        $isValid = true;

        // JSON-RPC protocol
        if ($this->getJtlrpc() === null || $this->getJtlrpc() != "2.0") {
            $isValid = false;
        }

        // This member MUST NOT exist if there was an error invoking the method.
        //if ($this->getResult() !== null && $this->getError() !== null) {
        //$isValid = false;
        //}

        // This member MUST NOT exist if there was no error triggered during
        // invocation.
        if ($this->getResult() === null && $this->getError() === null) {
            $isValid = false;
        }

        if ($this->getError() !== null) {
            $error = $this->getError();
            $error->validate();
        }

        // An identifier established by the Client that MUST contain a String,
        // Number, or NULL value if included
        if ($this->getId() === null || strlen($this->getId()) == 0) {
            $isValid = false;
        }

        if (!$isValid) {
            throw new RpcException("Parse error", ErrorCode::PARSE_ERROR);
        }
    }

    /**
     * @return string
     */
    public function serialize(): string
    {
        $serializer = SerializerBuilder::getInstance()->build();
        $context = (new SerializationContext())->setSerializeNull(true);
        return $serializer->serialize($this, 'json', $context);
    }
}
