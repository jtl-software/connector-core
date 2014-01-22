<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueI18n Model
 * locale specifig productVariationValue name.
 *
 * @access public
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = '';
    
    /**
     * @var string - Locale specific variationValue name
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
     * @param string $localeName
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    
    /**
     * @param string $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}