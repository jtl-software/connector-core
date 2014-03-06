<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueDependency Model
 * ToDo: Remove (deprecated)
 *
 * @access public
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @var string
     */
    protected $_productVariationValueId = '';             
    
    /**
     * @var string
     */
    protected $_productVariationValueTargetId = '';             
    
    /**
     * ProductVariationValueDependency Setter
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
                case "_productVariationValueId":
                case "_productVariationValueTargetId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    /**
     * @param string $productVariationValueTargetId
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     */
    public function setProductVariationValueTargetId($productVariationValueTargetId)
    {
        $this->_productVariationValueTargetId = (string)$productVariationValueTargetId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueTargetId()
    {
        return $this->_productVariationValueTargetId;
    }
}