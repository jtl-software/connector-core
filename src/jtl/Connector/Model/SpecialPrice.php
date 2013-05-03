<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecialPrice Model
 * @access public
 */
abstract class SpecialPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productSpecialPriceId;
    
    /**
     * @var double
     */
    protected $_priceNet;
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param int $productSpecialPriceId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setProductSpecialPriceId($productSpecialPriceId)
    {
        $this->_productSpecialPriceId = (int)$productSpecialPriceId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductSpecialPriceId()
    {
        return $this->_productSpecialPriceId;
    }
    /**
     * @param double $priceNet
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setPriceNet($priceNet)
    {
        $this->_priceNet = (double)$priceNet;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPriceNet()
    {
        return $this->_priceNet;
    }
}
?>