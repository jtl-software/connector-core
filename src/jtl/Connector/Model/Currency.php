<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Currency model properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Currency extends DataModel
{
    /**
     * @type Identity Unique currency id
     */
    protected $id = null;

    /**
     * @type string Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $delimiterCent = '';

    /**
     * @type string Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    protected $delimiterThousand = '';

    /**
     * @type double Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $factor = 0.0;

    /**
     * @type bool Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $hasCurrencySignBeforeValue = false;

    /**
     * @type bool Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $isDefault = false;

    /**
     * @type string Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $iso = '';

    /**
     * @type string Currency name
     */
    protected $name = '';

    /**
     * @type string Optional HTML name e.g. "&euro;"
     */
    protected $nameHtml = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique currency id
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDelimiterCent(Identity $delimiterCent)
    {
        return $this->setProperty('DelimiterCent', $delimiterCent, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDelimiterThousand(Identity $delimiterThousand)
    {
        return $this->setProperty('DelimiterThousand', $delimiterThousand, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFactor(Identity $factor)
    {
        return $this->setProperty('Factor', $factor, 'double');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setHasCurrencySignBeforeValue(Identity $hasCurrencySignBeforeValue)
    {
        return $this->setProperty('HasCurrencySignBeforeValue', $hasCurrencySignBeforeValue, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsDefault(Identity $isDefault)
    {
        return $this->setProperty('IsDefault', $isDefault, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIso(Identity $iso)
    {
        return $this->setProperty('Iso', $iso, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNameHtml(Identity $nameHtml)
    {
        return $this->setProperty('NameHtml', $nameHtml, 'string');
    }

    /**
     * @return string Optional HTML name e.g. "&euro;"
     */
    public function getNameHtml()
    {
        return $this->nameHtml;
    }

 
}
