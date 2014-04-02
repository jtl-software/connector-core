<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariation Model. Each product defines its own variations, that means  variations are not global  in contrast to specifics. 
 *
 * @access public
 * @subpackage Product
 */
class ProductVariation extends DataModel
{
    /**
     * @var string Unique productVariation id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';             
    
    /**
     * @var string Variation type e.g. radio or select
     */
    protected $_type = '';             
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;             
    
    /**
     * ProductVariation Setter
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
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique productVariation id
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique productVariation id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductVariation
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
     * @param string $type Variation type e.g. radio or select
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string Variation type e.g. radio or select
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariation
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