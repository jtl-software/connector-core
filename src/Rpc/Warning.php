<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Rpc;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\RpcException;

/**
 * Rpc Error
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Warning
{
    /**
     * A String providing a short description of the error.
     *
     * The message SHOULD be limited to a concise single sentence.
     *
     * @Serializer\Type("string")
     */
    public string $message = '';
    public string $type    = Warnings::TYPE_DEFAULT;

    /**
     * Validates a Rpc Error
     *
     * @return void
     * @throws RpcException
     */
    final public function validate(): void
    {
        $isValid = true;

        // A String providing a short description of the warning. The message
        // SHOULD be limited to a concise single sentence.
        if ($this->getMessage() === '') {
            $isValid = false;
        }

        if (!$isValid) {
            throw RpcException::parseError();
        }
    }

    /**
     * Getter for $message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Setter for $message
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
