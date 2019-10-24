<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConnectorServerInfo extends DataModel
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("memoryLimit")
     * @Serializer\Accessor(getter="getMemoryLimit",setter="setMemoryLimit")
     */
    protected $memoryLimit = 0;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("executionTime")
     * @Serializer\Accessor(getter="getExecutionTime",setter="setExecutionTime")
     */
    protected $executionTime = 0;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("postMaxSize")
     * @Serializer\Accessor(getter="getPostMaxSize",setter="setPostMaxSize")
     */
    protected $postMaxSize = 0;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("uploadMaxFilesize")
     * @Serializer\Accessor(getter="getUploadMaxFilesize",setter="setUploadMaxFilesize")
     */
    protected $uploadMaxFilesize = 0;
    
    /**
     * @return integer
     */
    public function getMemoryLimit(): int
    {
        return $this->memoryLimit;
    }
    
    /**
     * @param integer $memoryLimit
     * @return ConnectorServerInfo
     */
    public function setMemoryLimit(int $memoryLimit): ConnectorServerInfo
    {
        $this->memoryLimit = $memoryLimit;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }
    
    /**
     * @param integer $executionTime
     * @return ConnectorServerInfo
     */
    public function setExecutionTime(int $executionTime): ConnectorServerInfo
    {
        $this->executionTime = $executionTime;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPostMaxSize(): int
    {
        return $this->postMaxSize;
    }
    
    /**
     * @param integer $postMaxSize
     * @return ConnectorServerInfo
     */
    public function setPostMaxSize(int $postMaxSize): ConnectorServerInfo
    {
        $this->postMaxSize = $postMaxSize;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getUploadMaxFilesize(): int
    {
        return $this->uploadMaxFilesize;
    }
    
    /**
     * @param integer $uploadMaxFilesize
     * @return ConnectorServerInfo
     */
    public function setUploadMaxFilesize(int $uploadMaxFilesize): ConnectorServerInfo
    {
        $this->uploadMaxFilesize = $uploadMaxFilesize;
        
        return $this;
    }
}
