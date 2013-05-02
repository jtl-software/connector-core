<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductI18n Model
 * @access public
 */
abstract class ProductI18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var 
     */
    protected $_shortDescription;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param  $productId
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param int $name
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param  $url
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrl($url)
    {
        $this->_url = ()$url;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUrl()
    {
        return $this->_url;
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
     * @param  $shortDescription
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = ()$shortDescription;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductI18n/ProductI18n.json", $this->getPublic(array()));
    }
}
?>