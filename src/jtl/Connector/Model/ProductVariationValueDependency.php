<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated)
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @var Identity
     */
    protected $_productVariationValueId = null;
    
    /**
     * @var Identity
     */
    protected $_productVariationValueTargetId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_productVariationValueId',
        '_productVariationValueTargetId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        $this->_productVariationValueId = $productVariationValueId;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    /**
     * @param Identity $productVariationValueTargetId
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     */
    public function setProductVariationValueTargetId(Identity $productVariationValueTargetId)
    {
        $this->_productVariationValueTargetId = $productVariationValueTargetId;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductVariationValueTargetId()
    {
        return $this->_productVariationValueTargetId;
    }
}