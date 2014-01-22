<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * Currency model properties.
 *
 * @access public
 */
class Currency extends DataModel
{
    /**
     * @var string - Unique currency id
     */
    protected $_id = '';
    
    /**
     * @var string - Currency name
     */
    protected $_name = '';
    
    /**
     * @var string - Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $_iso = '';
    
    /**
     * @var string - Optional HTML name e.g. "&euro;"
     */
    protected $_nameHtml = '';
    
    /**
     * @var double - Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $_factor = 1;
    
    /**
     * @var bool - Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $_isDefault = False;
    
    /**
     * @var bool - Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $_hasCurrencySignBeforeValue = False;
    
    /**
     * @var string - Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterCent = ',';
    
    /**
     * @var string - Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
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
     * @param string $id
     * @return \jtl\Connector\Model\Currency
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\Currency
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
     * @param string $iso
     * @return \jtl\Connector\Model\Currency
     */
    public function setIso($iso)
    {
        $this->_iso = (string)$iso;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIso()
    {
        return $this->_iso;
    }
    
    /**
     * @param string $nameHtml
     * @return \jtl\Connector\Model\Currency
     */
    public function setNameHtml($nameHtml)
    {
        $this->_nameHtml = (string)$nameHtml;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNameHtml()
    {
        return $this->_nameHtml;
    }
    
    /**
     * @param double $factor
     * @return \jtl\Connector\Model\Currency
     */
    public function setFactor($factor)
    {
        $this->_factor = (double)$factor;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFactor()
    {
        return $this->_factor;
    }
    
    /**
     * @param bool $isDefault
     * @return \jtl\Connector\Model\Currency
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    
    /**
     * @param bool $hasCurrencySignBeforeValue
     * @return \jtl\Connector\Model\Currency
     */
    public function setHasCurrencySignBeforeValue($hasCurrencySignBeforeValue)
    {
        $this->_hasCurrencySignBeforeValue = (bool)$hasCurrencySignBeforeValue;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getHasCurrencySignBeforeValue()
    {
        return $this->_hasCurrencySignBeforeValue;
    }
    
    /**
     * @param string $delimiterCent
     * @return \jtl\Connector\Model\Currency
     */
    public function setDelimiterCent($delimiterCent)
    {
        $this->_delimiterCent = (string)$delimiterCent;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDelimiterCent()
    {
        return $this->_delimiterCent;
    }
    
    /**
     * @param string $delimiterThousand
     * @return \jtl\Connector\Model\Currency
     */
    public function setDelimiterThousand($delimiterThousand)
    {
        $this->_delimiterThousand = (string)$delimiterThousand;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDelimiterThousand()
    {
        return $this->_delimiterThousand;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}