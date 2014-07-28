<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Currency model properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Currency extends DataModel
{
    /**
     * @type Identity Unique currency id
     */
    public $_id = null;

    /**
     * @type boolean 
     */
    public $_beforeAmount = false;

    /**
     * @type string 
     */
    public $_decimalSeparator = '';

    /**
     * @type float Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    public $_factor = 0.0;

    /**
     * @type boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    public $_isDefault = false;

    /**
     * @type DateTime|null 
     */
    public $_lastModified = null;

    /**
     * @type string 
     */
    public $_mapping = '';

    /**
     * @type string Currency name
     */
    public $_name = '';

    /**
     * @type string Currency name
     */
    public $_nameHTML = '';

    /**
     * @type string 
     */
    public $_thousandsSeparator = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $name Currency name
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Currency name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $nameHTML Currency name
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNameHTML($nameHTML)
    {
        return $this->setProperty('_nameHTML', $nameHTML, 'string');
    }
    
    /**
     * @return string Currency name
     */
    public function getNameHTML()
    {
        return $this->_nameHTML;
    }

    /**
     * @param  float $factor Optional conversion factor to default currency. Default is 1 (equals default currency)
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFactor($factor)
    {
        return $this->setProperty('_factor', $factor, 'float');
    }
    
    /**
     * @return float Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    public function getFactor()
    {
        return $this->_factor;
    }

    /**
     * @param  string $decimalSeparator 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDecimalSeparator($decimalSeparator)
    {
        return $this->setProperty('_decimalSeparator', $decimalSeparator, 'string');
    }
    
    /**
     * @return string 
     */
    public function getDecimalSeparator()
    {
        return $this->_decimalSeparator;
    }

    /**
     * @param  string $thousandsSeparator 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setThousandsSeparator($thousandsSeparator)
    {
        return $this->setProperty('_thousandsSeparator', $thousandsSeparator, 'string');
    }
    
    /**
     * @return string 
     */
    public function getThousandsSeparator()
    {
        return $this->_thousandsSeparator;
    }

    /**
     * @param  DateTime $lastModified 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setLastModified(DateTime $lastModified)
    {
        return $this->setProperty('_lastModified', $lastModified, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * @param  string $mapping 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMapping($mapping)
    {
        return $this->setProperty('_mapping', $mapping, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMapping()
    {
        return $this->_mapping;
    }

    /**
     * @param  Identity $id Unique currency id
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique currency id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  boolean $isDefault Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('_isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }

    /**
     * @param  boolean $beforeAmount 
     * @return \jtl\Connector\Model\Currency
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setBeforeAmount($beforeAmount)
    {
        return $this->setProperty('_beforeAmount', $beforeAmount, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getBeforeAmount()
    {
        return $this->_beforeAmount;
    }
}

