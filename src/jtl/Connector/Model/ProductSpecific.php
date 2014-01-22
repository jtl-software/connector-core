<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecific Model
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar. 
 *
 * @access public
 */
class ProductSpecific extends DataModel
{
    /**
     * @var string - Unique productSpecific id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to specificValue
     */
    protected $_specificValueId = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * ProductSpecific Setter
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
                case "_specificValueId":
                case "_productId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $specificValueId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setSpecificValueId($specificValueId)
    {
        $this->_specificValueId = (string)$specificValueId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    
    /**
     * @param string $productId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}