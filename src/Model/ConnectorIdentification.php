<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

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
     * @return ConnectorIdentification
     */
    public function setEndpointVersion(string $endpointVersion): ConnectorIdentification
    {
        $this->endpointVersion = $endpointVersion;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEndpointVersion(): string
    {
        return $this->endpointVersion;
    }
    
    /**
     * @param string $platformName
     * @return ConnectorIdentification
     */
    public function setPlatformName(string $platformName): ConnectorIdentification
    {
        $this->platformName = $platformName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPlatformName(): string
    {
        return $this->platformName;
    }
    
    /**
     * @param string $platformVersion
     * @return ConnectorIdentification
     */
    public function setPlatformVersion(string $platformVersion): ConnectorIdentification
    {
        $this->platformVersion = $platformVersion;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPlatformVersion(): string
    {
        return $this->platformVersion;
    }
    
    /**
     * @param integer $protocolVersion
     * @return ConnectorIdentification
     */
    public function setProtocolVersion(int $protocolVersion): ConnectorIdentification
    {
        $this->protocolVersion = $protocolVersion;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getProtocolVersion(): int
    {
        return $this->protocolVersion;
    }
    
    /**
     * @param ConnectorServerInfo $connectorServerInfo
     * @return ConnectorIdentification
     */
    public function setServerInfo(ConnectorServerInfo $connectorServerInfo): ConnectorIdentification
    {
        $this->serverInfo = $connectorServerInfo;
        
        return $this;
    }
    
    /**
     * @return ConnectorServerInfo
     */
    public function getServerInfo(): ?ConnectorServerInfo
    {
        return $this->serverInfo;
    }
}
