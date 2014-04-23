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
}