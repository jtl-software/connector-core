<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar. 
 *
 * @access public
 * @subpackage Product
 */
class ProductSpecific extends DataModel
{
    /**
     * @var Identity Unique productSpecific id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to specificValue
     */
    protected $_specificValueId = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'specificValueId',
        'productId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productSpecific id
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productSpecific id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        $this->_specificValueId = $specificValueId;
        return $this;
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecific
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