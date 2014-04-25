<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Product-Category Allocation.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class Product2Category extends DataModel
{
    /**
     * @var string Unique product2Category id
     */
    protected $_id = '';
    
    /**
     * @var Identity Reference to category
     */
    protected $_categoryId = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_categoryId',
        '_productId'
    );
    
    /**
     * Product2Category Setter
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_categoryId":
                case "_productId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique product2Category id
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique product2Category id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setCategoryId(Identity $categoryId)
    {
        $this->_categoryId = $categoryId;
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\Product2Category
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
}