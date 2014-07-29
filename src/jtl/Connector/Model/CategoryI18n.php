<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryI18n extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type string Optional localized Long Description
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized category name
     */
    protected $name = '';

    /**
     * @type string 
     */
    protected $url = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'categoryId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  string $name Localized category name
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Localized category name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $description Optional localized Long Description
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }
    
    /**
     * @return string Optional localized Long Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('url', $url, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}

