<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Localized product attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductAttr extends DataModel
{
    /**
     * @var Identity Unique productAttr id
     */
    protected $_id = null;
    
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
        '_productId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productAttr id
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductAttr
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