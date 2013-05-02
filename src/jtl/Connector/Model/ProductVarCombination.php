<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVarCombination Model
 * @access public
 */
abstract class ProductVarCombination extends Model
{
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_productVariationId;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\ProductVarCombination
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
     * @param  $productVariationId
     * @return \jtl\Connector\Model\ProductVarCombination
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
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVarCombination/ProductVarCombination.json", $this->getPublic(array()));
    }
}
?>