<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency model properties.
 *
 * @access public
 * @subpackage GlobalData
 */
class Currency extends DataModel
{
    /**
     * @var Identity Unique currency id
     */
    protected $_id = null;
    
    /**
     * @var string Currency name
     */
    protected $_name = '';
    
    /**
     * @var string Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $_iso = '';
    
    /**
     * @var string Optional HTML name e.g. "&euro;"
     */
    protected $_nameHtml = '';
    
    /**
     * @var double Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $_factor = 1;
    
    /**
     * @var bool Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $_isDefault = false;
    
    /**
     * @var bool Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $_hasCurrencySignBeforeValue = false;
    
    /**
     * @var string Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterCent = ',';
    
    /**
     * @var string Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterThousand = '.';
    
    /**
     * Currency Setter
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
                case "_id":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_name":
                case "_iso":
                case "_nameHtml":
                case "_delimiterCent":
                case "_delimiterThousand":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_factor":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_hasCurrencySignBeforeValue":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique currency id
     * @return \jtl\Connector\Model\Currency
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique currency id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Currency name
     * @return \jtl\Connector\Model\Currency
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Currency name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $iso Currency ISO 4217 (3-letter Uppercase Code)
     * @return \jtl\Connector\Model\Currency
     */
    public function setIso($iso)
    {
        $this->_iso = (string)$iso;
        return $this;
    }
    
    /**
     * @return string Currency ISO 4217 (3-letter Uppercase Code)
     */
    public function getIso()
    {
        return $this->_iso;
    }
    /**
     * @param string $nameHtml Optional HTML name e.g. "&euro;"
     * @return \jtl\Connector\Model\Currency
     */
    public function setNameHtml($nameHtml)
    {
        $this->_nameHtml = (string)$nameHtml;
        return $this;
    }
    
    /**
     * @return string Optional HTML name e.g. "&euro;"
     */
    public function getNameHtml()
    {
        return $this->_nameHtml;
    }
    /**
     * @param double $factor Optional conversion factor to default currency. Default is 1 (equals default currency)
     * @return \jtl\Connector\Model\Currency
     */
    public function setFactor($factor)
    {
        $this->_factor = (double)$factor;
        return $this;
    }
    
    /**
     * @return double Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    public function getFactor()
    {
        return $this->_factor;
    }
    /**
     * @param bool $isDefault Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     * @return \jtl\Connector\Model\Currency
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    /**
     * @param bool $hasCurrencySignBeforeValue Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     * @return \jtl\Connector\Model\Currency
     */
    public function setHasCurrencySignBeforeValue($hasCurrencySignBeforeValue)
    {
        $this->_hasCurrencySignBeforeValue = (bool)$hasCurrencySignBeforeValue;
        return $this;
    }
    
    /**
     * @return bool Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    public function getHasCurrencySignBeforeValue()
    {
        return $this->_hasCurrencySignBeforeValue;
    }
    /**
     * @param string $delimiterCent Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     * @return \jtl\Connector\Model\Currency
     */
    public function setDelimiterCent($delimiterCent)
    {
        $this->_delimiterCent = (string)$delimiterCent;
        return $this;
    }
    
    /**
     * @return string Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    public function getDelimiterCent()
    {
        return $this->_delimiterCent;
    }
    /**
     * @param string $delimiterThousand Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     * @return \jtl\Connector\Model\Currency
     */
    public function setDelimiterThousand($delimiterThousand)
    {
        $this->_delimiterThousand = (string)$delimiterThousand;
        return $this;
    }
    
    /**
     * @return string Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    public function getDelimiterThousand()
    {
        return $this->_delimiterThousand;
    }
}