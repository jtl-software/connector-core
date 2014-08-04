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
     * @type bool Flag default language for frontend. Exact 1 language must be marked as default.
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
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique language id
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique language id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  bool $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsDefault(Identity $isDefault)
    {
        return $this->setProperty('IsDefault', $isDefault, 'bool');
    }

    /**
     * @return bool Flag default language for frontend. Exact 1 language must be marked as default.
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $nameEnglish English term
     * @return \jtl\Connector\Model\Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNameEnglish(Identity $nameEnglish)
    {
        return $this->setProperty('NameEnglish', $nameEnglish, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNameGerman(Identity $nameGerman)
    {
        return $this->setProperty('NameGerman', $nameGerman, 'string');
    }

    /**
     * @return string German term
     */
    public function getNameGerman()
    {
        return $this->nameGerman;
    }

 
}
