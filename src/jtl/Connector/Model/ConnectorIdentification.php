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
class ConnectorIdentification extends DataModel
{
    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpointVersion")
     * @Serializer\Accessor(getter="getEndpointVersion",setter="setEndpointVersion")
     */
    protected $endpointVersion = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformName")
     * @Serializer\Accessor(getter="getPlatformName",setter="setPlatformName")
     */
    protected $platformName = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformVersion")
     * @Serializer\Accessor(getter="getPlatformVersion",setter="setPlatformVersion")
     */
    protected $platformVersion = '';


    /**
     * @param string $endpointVersion 
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setEndpointVersion($endpointVersion)
    {
        return $this->setProperty('endpointVersion', $endpointVersion, 'string');
    }

    /**
     * @return string 
     */
    public function getEndpointVersion()
    {
        return $this->endpointVersion;
    }

    /**
     * @param string $platformName 
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setPlatformName($platformName)
    {
        return $this->setProperty('platformName', $platformName, 'string');
    }

    /**
     * @return string 
     */
    public function getPlatformName()
    {
        return $this->platformName;
    }

    /**
     * @param string $platformVersion 
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setPlatformVersion($platformVersion)
    {
        return $this->setProperty('platformVersion', $platformVersion, 'string');
    }

    /**
     * @return string 
     */
    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }
}
