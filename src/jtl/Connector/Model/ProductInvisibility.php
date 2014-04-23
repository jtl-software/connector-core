<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specify product to hide from customerGroup.
 *
 * @access public
 * @subpackage Product
 */
class ProductInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'customerGroupId',
        'productId'
    );
    
    /**
     * ProductInvisibility Setter
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
                case "_customerGroupId":
                case "_productId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductInvisibility
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        $this->_customerGroupId = $customerGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductInvisibility
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