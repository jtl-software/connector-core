<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @type Identity Reference to manufacturer
     */
    protected $manufacturerId = null;

    /**
     * @type string Optional manufacturer description (HTML)
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Optional meta description tag value
     */
    protected $metaDescription = '';

    /**
     * @type string Optional meta keywords tag value
     */
    protected $metaKeywords = '';

    /**
     * @type string 
     */
    protected $metaTitle = '';


    /**
     * @type array list of identities
     */
    public $identities = array(
        'manufacturerId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
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
     * @param  string $metaTitle 
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaTitle($metaTitle)
    {
        return $this->setProperty('metaTitle', $metaTitle, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param  string $metaKeywords Optional meta keywords tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
    }
    
    /**
     * @return string Optional meta keywords tag value
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $metaDescription Optional meta description tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
    }
    
    /**
     * @return string Optional meta description tag value
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  string $description Optional manufacturer description (HTML)
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }
    
    /**
     * @return string Optional manufacturer description (HTML)
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('manufacturerId', $manufacturerId, 'Identity');
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ManufacturerI18n
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

