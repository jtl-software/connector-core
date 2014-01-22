<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationI18n Model
 * Locale specific product variation properties. 
 *
 * @access public
 */
class ProductVariationI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var string Locale specific variation name
     */
    protected $_name = '';
    
    /**
     * ProductVariationI18n Setter
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
                case "_productVariationId":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ProductVariationI18n
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
     * @param string $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationI18n
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (string)$productVariationId;
        return $this;
    }
    
    /**
     * @return string Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    /**
     * @param string $name Locale specific variation name
     * @return \jtl\Connector\Model\ProductVariationI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Locale specific variation name
     */
    public function getName()
    {
        return $this->_name;
    }
}