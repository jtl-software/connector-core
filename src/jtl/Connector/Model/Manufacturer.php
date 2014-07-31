<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Manufacturer / brand properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Manufacturer extends DataModel
{
    /**
     * @type Identity Unique manufacturer id
     */
    protected $id = null;

    /**
     * @type string Manufacturer (brand) name
     */
    protected $name = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * @type string 
     */
    protected $urlPath = '';

    /**
     * @type string Optional manufacturer website URL
     */
    protected $www = '';

    /**
     * Nav [Manufacturer » One]
     *
     * @type \jtl\Connector\Model\ManufacturerI18n[]
     */
    protected $i18ns = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @param  string $name Manufacturer (brand) name
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Manufacturer (brand) name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $www Optional manufacturer website URL
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('www', $www, 'string');
    }
    
    /**
     * @return string Optional manufacturer website URL
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $urlPath 
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param  Identity $id Unique manufacturer id
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique manufacturer id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  \jtl\Connector\Model\ManufacturerI18n $i18n
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function addI18n(\jtl\Connector\Model\ManufacturerI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return ManufacturerI18n
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
}

