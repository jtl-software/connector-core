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
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_shortDescription;
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param string $url
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }
    
    /**
     * @return string
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductI18n/ProductI18n.json", $this->getPublic(array()));
    }
}
?>