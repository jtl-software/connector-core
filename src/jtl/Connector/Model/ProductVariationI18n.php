<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVariationI18n Model
 * @access public
 */
abstract class ProductVariationI18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_productVariationId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ProductVariationI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param  $productVariationId
     * @return \jtl\Connector\Model\ProductVariationI18n
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
     * @param int $name
     * @return \jtl\Connector\Model\ProductVariationI18n
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVariationI18n/ProductVariationI18n.json", $this->getPublic(array()));
    }
}
?>