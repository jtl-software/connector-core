<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Product-ConfigGroup Assignment.
 *
 * @access public
 * @subpackage Product
 */
class ProductConfigGroup extends DataModel
{
    /**
     * @var Identity Unique productConfigGroup id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to configGroup
     */
    protected $_configGroupId = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_configGroupId',
        '_productId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productConfigGroup id
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productConfigGroup id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        $this->_configGroupId = $configGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
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