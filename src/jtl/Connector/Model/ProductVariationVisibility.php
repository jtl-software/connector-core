<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVariationVisibility Model
 * @access public
 */
abstract class ProductVariationVisibility extends Model
{
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productVariationId;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationVisibility
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
     * @param  $productVariationId
     * @return \jtl\Connector\Model\ProductVariationVisibility
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = ()$productVariationId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVariationVisibility/ProductVariationVisibility.json", $this->getPublic(array()));
    }
}
?>