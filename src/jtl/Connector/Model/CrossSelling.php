<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Link 2 products that are in a common crossSellingGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class CrossSelling extends DataModel
{
    /**
     * @var Identity Unique crossSelling id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product (main product)
     */
    protected $_crossSellingProductId = null;
    
    /**
     * @var Identity Reference to crossSellingGroup
     */
    protected $_crossSellingGroupId = null;
    
    /**
     * @var Identity Reference to product (cross selling product)
     */
    protected $_productId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_crossSellingProductId',
        '_crossSellingGroupId',
        '_productId'
    );
    
    /**
     * CrossSelling Setter
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
                case "_crossSellingProductId":
                case "_crossSellingGroupId":
                case "_productId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique crossSelling id
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique crossSelling id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $crossSellingProductId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingProductId(Identity $crossSellingProductId)
    {
        $this->_crossSellingProductId = $crossSellingProductId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product (main product)
     */
    public function getCrossSellingProductId()
    {
        return $this->_crossSellingProductId;
    }
    /**
     * @param Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId)
    {
        $this->_crossSellingGroupId = $crossSellingGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId()
    {
        return $this->_crossSellingGroupId;
    }
    /**
     * @param Identity $productId Reference to product (cross selling product)
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->_productId;
    }
}