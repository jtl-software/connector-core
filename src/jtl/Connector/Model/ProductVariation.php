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
     * @var Identity Unique productVariation id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var string Variation type e.g. radio or select
     */
    protected $_type = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'productId'
    );
    
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
                
                    $this->$name = Identity::convert();
                    break;
            
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
     * @param Identity $id Unique productVariation id
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productVariation id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductVariation
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