<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationVisibility Model
 * @access public
 */
abstract class ProductVariationVisibility extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationVisibility
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
     * @param int $productVariationId
     * @return \jtl\Connector\Model\ProductVariationVisibility
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (int)$productVariationId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
}
?>