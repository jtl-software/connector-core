<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductConfigGroup Model
 * Product-ConfigGroup Assignment.
 *
 * @access public
 */
class ProductConfigGroup extends DataModel
{
    /**
     * @var string Unique productConfigGroup id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to configGroup
     */
    protected $_configGroupId = '';
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * ProductConfigGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_configGroupId":
                case "_productId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique productConfigGroup id
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique productConfigGroup id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setConfigGroupId($configGroupId)
    {
        $this->_configGroupId = (string)$configGroupId;
        return $this;
    }
    
    /**
     * @return string Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }
}