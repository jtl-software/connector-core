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
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductVarCombination
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
    
    /**
     * @param int $productVariationId
     * @return \jtl\Connector\Model\ProductVarCombination
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
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
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
        Schema::validateModel(CONNECTOR_DIR . "schema/productvarcombination/productvarcombination.json", $this->getPublic(array()));
    }
}
?>