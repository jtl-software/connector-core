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
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
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
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("protocolVersion")
     * @Serializer\Accessor(getter="getProtocolVersion",setter="setProtocolVersion")
     */
    protected $protocolVersion = '';
    
    /**
     * @var ConnectorServerInfo
     * @Serializer\Type("jtl\Connector\Model\ConnectorServerInfo")
     * @Serializer\SerializedName("serverInfo")
     * @Serializer\Accessor(getter="getServerInfo",setter="setServerInfo")
     */
    protected $serverInfo = null;
    
    /**
     * @param string $endpointVersion
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setEndpointVersion($endpointVersion)
    {
        $this->endpointVersion = $endpointVersion;
        
        return $this;
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
        $this->platformName = $platformName;
        
        return $this;
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
        $this->platformVersion = $platformVersion;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }
    
    /**
     * @param integer $protocolVersion
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setProtocolVersion($protocolVersion)
    {
        $this->protocolVersion = $protocolVersion;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }
    
    /**
     * @param ConnectorServerInfo $connectorServerInfo
     * @return \jtl\Connector\Model\ConnectorIdentification
     */
    public function setServerInfo(ConnectorServerInfo $connectorServerInfo)
    {
        $this->serverInfo = $connectorServerInfo;
    }
    
    /**
     * @return ConnectorServerInfo
     */
    public function getServerInfo()
    {
        return $this->serverInfo;
    }
}
