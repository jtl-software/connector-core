<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Identity
 */

namespace jtl\Connector\Model;

/**
 * Identity
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Identity
 */
class Identity
{
    /**
     * @var string
     */
    protected $endpoint = '';
    
    /**
     * @var string
     */
    protected $host = '';

    /**
     * Constructor
     */
    public function __construct($endpoint = null, $host = null)
    {
        $this->endpoint = $endpoint;
        $this->host = $host;
    }

    /**
     * Gets the value of endpoint.
     *
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
    
    /**
     * Sets the value of endpoint.
     *
     * @param mixed $endpoint the endpoint
     *
     * @return jtl\Connector\Model\Identity
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Gets the value of host.
     *
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }
    
    /**
     * Sets the value of host.
     *
     * @param mixed $host the host
     *
     * @return jtl\Connector\Model\Identity
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Convert to Array
     *
     * @return array
     */
    public function toArray()
    {
        return array($this->endpoint, $this->host);
    }

    /**
     * Convert from Array
     *
     * @throws \InvalidArgumentException
     * @return jtl\Connector\Model\Identity
     */
    public static function fromArray(array $data)
    {
        if ($data === null || count($data) != 2 || !array_key_exists(0, $data) || !array_key_exists(1, $data)) {
            throw new \InvalidArgumentException('The data parameter can not be null and must contain two values'); 
        }

        return new self($data[0], $data[1]);
    }

    /**
     * Dynamic Converter
     *
     * @return jtl\Connector\Model\Identity
     */
    public static function convert($data)
    {
        if ($data instanceof self) {
            return $data;
        }

        if (!is_array($data) && $data !== null) {
            return new self($data);
        }

        if ($data === null || (is_array($data) && (count($data) != 2 || !array_key_exists(0, $data) || !array_key_exists(1, $data)))) {
            return null;
        }

        try {
            return self::fromArray($data);
        } catch (\Exception $exc) {
            return null;
        }
    }
}