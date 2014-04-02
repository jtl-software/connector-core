<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * locale specifig productVariationValue name.
 *
 * @access public
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';             
    
    /**
     * @var string Reference to productVariationValue
     */
    protected $_productVariationValueId = '';             
    
    /**
     * @var string Locale specific variationValue name
     */
    protected $_name = '';             
    
    /**
     * ProductVariationValueI18n Setter
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
                case "_localeName":
                case "_productVariationValueId":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param string $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    /**
     * @param string $name Locale specific variationValue name
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Locale specific variationValue name
     */
    public function getName()
    {
        return $this->_name;
    }
}