<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CategoryI18n extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    public $_categoryId = null;

    /**
     * @type string Optional localized Long Description
     */
    public $_description = '';

    /**
     * @type string Locale
     */
    public $_localeName = '';

    /**
     * @type string Localized category name
     */
    public $_name = '';

    /**
     * @type string 
     */
    public $_url = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_categoryId',
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
     * @param  string $name Localized category name
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Localized category name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $description Optional localized Long Description
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string Optional localized Long Description
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('_url', $url, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('_categoryId', $categoryId, 'Identity');
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\CategoryI18n
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

