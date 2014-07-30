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
     * @type boolean 
     */
    protected $beforeAmount = false;

    /**
     * @type string 
     */
    protected $decimalSeparator = '';

    /**
     * @type float Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $factor = 0.0;

    /**
     * @type boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $isDefault = false;

    /**
     * @type DateTime|null 
     */
    protected $lastModified = null;

    /**
     * @type string 
     */
    protected $mapping = '';

    /**
     * @type string Currency name
     */
    protected $name = '';

    /**
     * @type string Currency name
     */
    protected $nameHTML = '';

    /**
     * @type string 
     */
    protected $thousandsSeparator = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'name' => 'string',
        'nameHTML' => 'string',
        'factor' => 'float',
        'decimalSeparator' => 'string',
        'thousandsSeparator' => 'string',
        'lastModified' => '\jtl\Connector\Model\DateTime',
        'mapping' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
        'isDefault' => 'boolean',
        'beforeAmount' => 'boolean',
    );


    /**
     * @param  string $name Currency name
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $nameHTML Currency name
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNameHTML($nameHTML)
    {
        return $this->setProperty('nameHTML', $nameHTML, 'string');
    }
    
    /**
     * @return string Currency name
     */
    public function getNameHTML()
    {
        return $this->nameHTML;
    }

    /**
     * @param  float $factor Optional conversion factor to default currency. Default is 1 (equals default currency)
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFactor($factor)
    {
        return $this->setProperty('factor', $factor, 'float');
    }
    
    /**
     * @return float Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * @param  string $decimalSeparator 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDecimalSeparator($decimalSeparator)
    {
        return $this->setProperty('decimalSeparator', $decimalSeparator, 'string');
    }
    
    /**
     * @return string 
     */
    public function getDecimalSeparator()
    {
        return $this->decimalSeparator;
    }

    /**
     * @param  string $thousandsSeparator 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setThousandsSeparator($thousandsSeparator)
    {
        return $this->setProperty('thousandsSeparator', $thousandsSeparator, 'string');
    }
    
    /**
     * @return string 
     */
    public function getThousandsSeparator()
    {
        return $this->thousandsSeparator;
    }

    /**
     * @param  DateTime $lastModified 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setLastModified(DateTime $lastModified)
    {
        return $this->setProperty('lastModified', $lastModified, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param  string $mapping 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMapping($mapping)
    {
        return $this->setProperty('mapping', $mapping, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @param  Identity $id Unique currency id
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  boolean $isDefault Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  boolean $beforeAmount 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setBeforeAmount($beforeAmount)
    {
        return $this->setProperty('beforeAmount', $beforeAmount, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getBeforeAmount()
    {
        return $this->beforeAmount;
    }
}

