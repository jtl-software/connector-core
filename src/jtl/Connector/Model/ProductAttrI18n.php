<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductAttrI18n Model
 * @access public
 */
abstract class ProductAttrI18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_productAttrId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_value;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ProductAttrI18n
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
     * @param  $productAttrId
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setProductAttrId($productAttrId)
    {
        $this->_productAttrId = ()$productAttrId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductAttrId()
    {
        return $this->_productAttrId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\ProductAttrI18n
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
     * @param  $value
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setValue($value)
    {
        $this->_value = ()$value;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductAttrI18n/ProductAttrI18n.json", $this->getPublic(array()));
    }
}
?>