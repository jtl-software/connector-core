<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductI18n Model
 * Locale specific texts for product
 *
 * @access public
 */
class ProductI18n extends DataModel
{
    /**
     * @var string - locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string - Product name / title
     */
    protected $_name = '';
    
    /**
     * @var string - Optional path of product URL
     */
    protected $_urlPath = '';
    
    /**
     * @var string - Optional product description
     */
    protected $_description = '';
    
    /**
     * @var string - Optional product shortdescription
     */
    protected $_shortDescription = '';
    
    /**
     * ProductI18n Setter
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
                case "_productId":
                case "_name":
                case "_urlPath":
                case "_description":
                case "_shortDescription":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param string $productId
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param string $urlPath
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrlPath($urlPath)
    {
        $this->_urlPath = (string)$urlPath;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }
    
    /**
     * @param string $description
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * @param string $shortDescription
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = (string)$shortDescription;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}