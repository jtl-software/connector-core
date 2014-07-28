<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Localized config item name and description..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    public $_configItemId = null;

    /**
     * @type string Description (html). Will be ignored, if inheritProductName==true
     */
    public $_description = '';

    /**
     * @type string Locale
     */
    public $_localeName = '';

    /**
     * @type string Config item name. Will be ignored if inheritProductName==true
     */
    public $_name = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_configItemId',
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
     * @param  string $name Config item name. Will be ignored if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Config item name. Will be ignored if inheritProductName==true
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $description Description (html). Will be ignored, if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string Description (html). Will be ignored, if inheritProductName==true
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('_configItemId', $configItemId, 'Identity');
    }
    
    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('_localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
}

