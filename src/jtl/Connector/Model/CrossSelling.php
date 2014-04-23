<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Link 2 products that are in a common crossSellingGroup.
 *
 * @access public
 * @subpackage Product
 */
class CrossSelling extends DataModel
{
    /**
     * @var Identity Unique crossSelling id
     */
    protected $_id = null;
    
    /**
     * @var string Reference to product (main product)
     */
    protected $_crossSellingProductId = '';
    
    /**
     * @var Identity Reference to crossSellingGroup
     */
    protected $_crossSellingGroupId = null;
    
    /**
     * @var string Reference to product (cross selling product)
     */
    protected $_productId = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'crossSellingGroupId'
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
                case "_crossSellingGroupId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_crossSellingProductId":
                case "_productId":
                
                    $this->$name = (string)$value;
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
     * @param string $crossSellingProductId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingProductId($crossSellingProductId)
    {
        $this->_crossSellingProductId = (string)$crossSellingProductId;
        return $this;
    }
    
    /**
     * @return string Reference to product (main product)
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
     * @param string $productId Reference to product (cross selling product)
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->_productId;
    }
}