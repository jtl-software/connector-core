<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Localized product attribute.
 *
 * @access public
 * @subpackage Product
 */
class ProductAttr extends DataModel
{
    /**
     * @var string Unique productAttr id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';             
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;             
    
    /**
     * ProductAttr Setter
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
     * @param string $id Unique productAttr id
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique productAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductAttr
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
     * @return \jtl\Connector\Model\ProductAttr
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