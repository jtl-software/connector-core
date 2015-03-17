<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductChecksum extends DataModel
{
    /**
     * @var int - Checksum used to check variations for change
     */
    const TYPE_VARIATION = 1;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpoint")
     * @Serializer\Accessor(getter="getEndpoint",setter="setEndpoint")
     */
    protected $endpoint = '';

    /**
     * @var boolean 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("hasChanged")
     * @Serializer\Accessor(getter="getHasChanged",setter="setHasChanged")
     */
    protected $hasChanged = false;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("host")
     * @Serializer\Accessor(getter="getHost",setter="setHost")
     */
    protected $host = '';

    /**
     * @var ProductChecksumType 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';


    /**
     * @param string $endpoint 
     * @return \jtl\Connector\Model\ProductChecksum
     */
    public function setEndpoint($endpoint)
    {
        return $this->setProperty('endpoint', $endpoint, 'string');
    }

    /**
     * @return string 
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param boolean $hasChanged 
     * @return \jtl\Connector\Model\ProductChecksum
     */
    public function setHasChanged($hasChanged)
    {
        return $this->setProperty('hasChanged', $hasChanged, 'boolean');
    }

    /**
     * @return boolean 
     */
    public function getHasChanged()
    {
        return $this->hasChanged;
    }

    /**
     * @param string $host 
     * @return \jtl\Connector\Model\ProductChecksum
     */
    public function setHost($host)
    {
        return $this->setProperty('host', $host, 'string');
    }

    /**
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param ProductChecksumType $type 
     * @return \jtl\Connector\Model\ProductChecksum
     * @throws \InvalidArgumentException if the provided argument is not of type 'ProductChecksumType'.
     */
    public function setType(ProductChecksumType $type = null)
    {
        return $this->setProperty('type', $type, 'string');
    }

    /**
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
