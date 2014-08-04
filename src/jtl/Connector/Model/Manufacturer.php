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
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
     * @type string Optional url path e.g. "Products-manufactured-by-X"
     */
    protected $urlPath = '';

    /**
     * @type string Optional manufacturer website URL
     */
    protected $www = '';

    /**
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
     * @param  Identity $id Unique manufacturer id
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique manufacturer id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $name Manufacturer (brand) name
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Manufacturer (brand) name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $urlPath Optional url path e.g. "Products-manufactured-by-X"
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUrlPath(Identity $urlPath)
    {
        return $this->setProperty('UrlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional url path e.g. "Products-manufactured-by-X"
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param  string $www Optional manufacturer website URL
     * @return \jtl\Connector\Model\Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWww(Identity $www)
    {
        return $this->setProperty('Www', $www, 'string');
    }

    /**
     * @return string Optional manufacturer website URL
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * @param  \jtl\Connector\Model\ManufacturerI18n $i18ns
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function addI18n(\jtl\Connector\Model\ManufacturerI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ManufacturerI18n[]
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
