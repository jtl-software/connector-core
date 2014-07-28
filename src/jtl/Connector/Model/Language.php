<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Global language model.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Language extends DataModel
{
    /**
     * @type Identity Unique language id
     */
    protected $id = null;

    /**
     * @type boolean Flag default language for frontend. Exact 1 language must be marked as default.
     */
    protected $isDefault = false;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string English term
     */
    protected $nameEnglish = '';

    /**
     * @type string German term
     */
    protected $nameGerman = '';


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
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
     * @param  string $nameEnglish English term
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNameEnglish($nameEnglish)
    {
        return $this->setProperty('nameEnglish', $nameEnglish, 'string');
    }
    
    /**
     * @return string English term
     */
    public function getNameEnglish()
    {
        return $this->nameEnglish;
    }

    /**
     * @param  string $nameGerman German term
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNameGerman($nameGerman)
    {
        return $this->setProperty('nameGerman', $nameGerman, 'string');
    }
    
    /**
     * @return string German term
     */
    public function getNameGerman()
    {
        return $this->nameGerman;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\Language
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

    /**
     * @param  Identity $id Unique language id
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique language id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  boolean $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean Flag default language for frontend. Exact 1 language must be marked as default.
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }
}

