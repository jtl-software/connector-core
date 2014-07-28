<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductI18n extends DataModel
{
    /**
     * @type Identity Reference to product
     */
    public $_productId = null;

    /**
     * @type string 
     */
    public $_description = '';

    /**
     * @type string locale
     */
    public $_localeName = '';

    /**
     * @type string 
     */
    public $_metaDescription = '';

    /**
     * @type string 
     */
    public $_metaKeywords = '';

    /**
     * @type string 
     */
    public $_name = '';

    /**
     * @type string 
     */
    public $_shortDescription = '';

    /**
     * @type string 
     */
    public $_titleTag = '';

    /**
     * @type string 
     */
    public $_urlPath = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_productId',
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
     * @param  string $name 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $description 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string 
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  string $shortDescription 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setProperty('_shortDescription', $shortDescription, 'string');
    }
    
    /**
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    /**
     * @param  string $urlPath 
     * @return \jtl\Connector\Model\ProductI18n
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
     * @param  string $titleTag 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('_titleTag', $titleTag, 'string');
    }
    
    /**
     * @return string 
     */
    public function getTitleTag()
    {
        return $this->_titleTag;
    }

    /**
     * @param  string $metaKeywords 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('_metaKeywords', $metaKeywords, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }

    /**
     * @param  string $metaDescription 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('_metaDescription', $metaDescription, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\ProductI18n
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

