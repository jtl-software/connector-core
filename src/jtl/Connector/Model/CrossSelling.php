<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CrossSelling Model
 * @access public
 */
abstract class CrossSelling extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_crossSellingProductId;
    
    /**
     * @var int
     */
    protected $_crossSellingGroupId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param int $crossSellingProductId
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingProductId($crossSellingProductId)
    {
        $this->_crossSellingProductId = (int)$crossSellingProductId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCrossSellingProductId()
    {
        return $this->_crossSellingProductId;
    }
    /**
     * @param int $crossSellingGroupId
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingGroupId($crossSellingGroupId)
    {
        $this->_crossSellingGroupId = (int)$crossSellingGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCrossSellingGroupId()
    {
        return $this->_crossSellingGroupId;
    }
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
}
?>