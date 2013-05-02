<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * SpecialPrice Model
 * @access public
 */
abstract class SpecialPrice extends Model
{
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productSpecialPriceId;
    
    /**
     * @var 
     */
    protected $_priceNet;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param  $productSpecialPriceId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setProductSpecialPriceId($productSpecialPriceId)
    {
        $this->_productSpecialPriceId = ()$productSpecialPriceId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductSpecialPriceId()
    {
        return $this->_productSpecialPriceId;
    }
    
    /**
     * @param  $priceNet
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setPriceNet($priceNet)
    {
        $this->_priceNet = ()$priceNet;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPriceNet()
    {
        return $this->_priceNet;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/SpecialPrice/SpecialPrice.json", $this->getPublic(array()));
    }
}
?>