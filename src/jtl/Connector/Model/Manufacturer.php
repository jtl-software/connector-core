<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Manufacturer / brand properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Manufacturer extends DataModel
{
    /**
     * @type Identity Unique manufacturer id
     */
    public $_id = null;

    /**
     * @type string 
     */
    public $_description = '';

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
    public $_metaTitle = '';

    /**
     * @type string Manufacturer (brand) name
     */
    public $_name = '';

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * @type string 
     */
    public $_url = '';

    /**
     * @type string Optional manufacturer website URL
     */
    public $_www = '';

    /**
     * Nav [Manufacturer » One]
     *
     * @type \jtl\Connector\Model\ManufacturerI18n[]
     */
    public $_i18ns = array();


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
        '_i18ns' => '\jtl\Connector\Model\ManufacturerI18n',
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
     * @param  string $name Manufacturer (brand) name
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Manufacturer (brand) name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $www Optional manufacturer website URL
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('_www', $www, 'string');
    }
    
    /**
     * @return string Optional manufacturer website URL
     */
    public function getWww()
    {
        return $this->_www;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  string $metaTitle 
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  string $metaKeywords 
     * @return \jtl\Connector\Model\Manufacturer
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
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  string $description 
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  Identity $id Unique manufacturer id
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique manufacturer id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  \jtl\Connector\Model\ManufacturerI18n $i18ns
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function addI18ns(\jtl\Connector\Model\ManufacturerI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return ManufacturerI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }
}

