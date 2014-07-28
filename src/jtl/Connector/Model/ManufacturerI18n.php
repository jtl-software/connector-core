<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @type Identity Reference to manufacturer
     */
    public $_manufacturerId = null;

    /**
     * @type string Optional manufacturer description (HTML)
     */
    public $_description = '';

    /**
     * @type string Locale
     */
    public $_localeName = '';

    /**
     * @type string Optional meta description tag value
     */
    public $_metaDescription = '';

    /**
     * @type string Optional meta keywords tag value
     */
    public $_metaKeywords = '';

    /**
     * @type string 
     */
    public $_metaTitle = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_manufacturerId',
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
     * @param  string $metaTitle 
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaTitle($metaTitle)
    {
        return $this->setProperty('_metaTitle', $metaTitle, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->_metaTitle;
    }

    /**
     * @param  string $metaKeywords Optional meta keywords tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('_metaKeywords', $metaKeywords, 'string');
    }
    
    /**
     * @return string Optional meta keywords tag value
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }

    /**
     * @param  string $metaDescription Optional meta description tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('_metaDescription', $metaDescription, 'string');
    }
    
    /**
     * @return string Optional meta description tag value
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }

    /**
     * @param  string $description Optional manufacturer description (HTML)
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string Optional manufacturer description (HTML)
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('_manufacturerId', $manufacturerId, 'Identity');
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ManufacturerI18n
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

