<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Locale specific texts for product
 *
 * @access public
 * @subpackage Product
 */
class ProductI18n extends DataModel
{
    /**
     * @var string locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var string Product name / title
     */
    protected $_name = '';
    
    /**
     * @var string Optional path of product URL
     */
    protected $_urlPath = '';
    
    /**
     * @var string Optional product description
     */
    protected $_description = '';
    
    /**
     * @var string Optional product shortdescription
     */
    protected $_shortDescription = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'productId'
    );
    
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
                case "_name":
                case "_urlPath":
                case "_description":
                case "_shortDescription":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_productId":
                
                    $this->$name = Identity::convert();
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName locale
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $name Product name / title
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Product name / title
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $urlPath Optional path of product URL
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrlPath($urlPath)
    {
        $this->_urlPath = (string)$urlPath;
        return $this;
    }
    
    /**
     * @return string Optional path of product URL
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }
    /**
     * @param string $description Optional product description
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional product description
     */
    public function getDescription()
    {
        return $this->_description;
    }
    /**
     * @param string $shortDescription Optional product shortdescription
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = (string)$shortDescription;
        return $this;
    }
    
    /**
     * @return string Optional product shortdescription
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }
}