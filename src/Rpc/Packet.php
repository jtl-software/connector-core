<?php
namespace Jtl\Connector\Core\Rpc;

use Jtl\Connector\Core\Model\AbstractModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * Rpc Packet
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Packet extends AbstractModel
{
    /**
     * A String specifying the version of the JSON-RPC protocol.
     * MUST be exactly "2.0".
     *
     * @var string
     * @Serializer\Type("string")
     */
    protected $jtlrpc = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $id = '';

    /**
     * Getter for $jtlrpc
     *
     * @return string
     */
    public function getJtlrpc(): string
    {
        return $this->jtlrpc;
    }

    /**
     * Setter for $jtlrpc
     *
     * @param string $jtlrpc
     * @return Packet
     */
    public function setJtlrpc(string $jtlrpc): Packet
    {
        $this->jtlrpc = $jtlrpc;
        return $this;
    }

    /**
     * Getter for $id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Setter for $id
     *
     * @param string $id
     * @return Packet
     */
    public function setId(string $id): Packet
    {
        $this->id = $id;
        return $this;
    }
}
