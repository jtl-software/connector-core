<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVisibility Model
 * @access public
 */
abstract class ProductVisibility extends Model
{
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductVisibility
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
     * @param  $productId
     * @return \jtl\Connector\Model\ProductVisibility
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVisibility/ProductVisibility.json", $this->getPublic(array()));
    }
}
?>