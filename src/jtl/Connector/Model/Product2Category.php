<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

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
     * @var string Reference to category
     */
    protected $_categoryId = '';             
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';             
    
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
                case "_categoryId":
                case "_productId":
                
                    $this->$name = (string)$value;
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
     * @param string $categoryId Reference to category
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\Product2Category
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
}