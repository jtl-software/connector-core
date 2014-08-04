<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Currency model properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class Currency extends DataModel
{
    /**
     * @var Identity Unique currency id
     */
    protected $id = null;

    /**
     * @var string Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $delimiterCent = '';

    /**
     * @var string Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    protected $delimiterThousand = '';

    /**
     * @var double Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $factor = 0.0;

    /**
     * @var bool Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $hasCurrencySignBeforeValue = false;

    /**
     * @var bool Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $isDefault = false;

    /**
     * @var string Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $iso = '';

    /**
     * @var string Currency name
     */
    protected $name = '';

    /**
     * @var string Optional HTML name e.g. "&euro;"
     */
    protected $nameHtml = '';

    /**
     * @param  Identity $id Unique currency id
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique currency id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $delimiterCent Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDelimiterCent($delimiterCent)
    {
        return $this->setProperty('delimiterCent', $delimiterCent, 'string');
    }

    /**
     * @return string Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    public function getDelimiterCent()
    {
        return $this->delimiterCent;
    }

    /**
     * @param  string $delimiterThousand Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDelimiterThousand($delimiterThousand)
    {
        return $this->setProperty('delimiterThousand', $delimiterThousand, 'string');
    }

    /**
     * @return string Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    public function getDelimiterThousand()
    {
        return $this->delimiterThousand;
    }

    /**
     * @param  double $factor Optional conversion factor to default currency. Default is 1 (equals default currency)
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setFactor($factor)
    {
        return $this->setProperty('factor', $factor, 'double');
    }

    /**
     * @return double Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * @param  bool $hasCurrencySignBeforeValue Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setHasCurrencySignBeforeValue($hasCurrencySignBeforeValue)
    {
        return $this->setProperty('hasCurrencySignBeforeValue', $hasCurrencySignBeforeValue, 'bool');
    }

    /**
     * @return bool Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    public function getHasCurrencySignBeforeValue()
    {
        return $this->hasCurrencySignBeforeValue;
    }

    /**
     * @param  bool $isDefault Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'bool');
    }

    /**
     * @return bool Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  string $iso Currency ISO 4217 (3-letter Uppercase Code)
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIso($iso)
    {
        return $this->setProperty('iso', $iso, 'string');
    }

    /**
     * @return string Currency ISO 4217 (3-letter Uppercase Code)
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param  string $name Currency name
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Currency name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $nameHtml Optional HTML name e.g. "&euro;"
     * @return \jtl\Connector\Model\Currency
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNameHtml($nameHtml)
    {
        return $this->setProperty('nameHtml', $nameHtml, 'string');
    }

    /**
     * @return string Optional HTML name e.g. "&euro;"
     */
    public function getNameHtml()
    {
        return $this->nameHtml;
    }

 
}
