<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Localized specific value text..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @type Identity Reference to specificValue
     */
    public $_specificValueId = null;

    /**
     * @type string Optional localized description
     */
    public $_description = '';

    /**
     * @type string locale
     */
    public $_localeName = '';

    /**
     * @type string Optional localized meta description value
     */
    public $_metaDescription = '';

    /**
     * @type string Optional localized meta keywords value
     */
    public $_metaKeywords = '';

    /**
     * @type string Optional localized title tag value
     */
    public $_titleTag = '';

    /**
     * @type string 
     */
    public $_urlPath = '';

    /**
     * @type string Localized value
     */
    public $_value = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_specificValueId',
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
     * @param  string $value Localized value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('_value', $value, 'string');
    }
    
    /**
     * @return string Localized value
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param  string $urlPath 
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('_urlPath', $urlPath, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }

    /**
     * @param  string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('_titleTag', $titleTag, 'string');
    }
    
    /**
     * @return string Optional localized title tag value
     */
    public function getTitleTag()
    {
        return $this->_titleTag;
    }

    /**
     * @param  string $metaKeywords Optional localized meta keywords value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('_metaKeywords', $metaKeywords, 'string');
    }
    
    /**
     * @return string Optional localized meta keywords value
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }

    /**
     * @param  string $metaDescription Optional localized meta description value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('_metaDescription', $metaDescription, 'string');
    }
    
    /**
     * @return string Optional localized meta description value
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }

    /**
     * @param  string $description Optional localized description
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string Optional localized description
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        return $this->setProperty('_specificValueId', $specificValueId, 'Identity');
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }

    /**
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('_localeName', $localeName, 'string');
    }
    
    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
}

