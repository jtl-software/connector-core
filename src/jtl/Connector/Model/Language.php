<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Global language model.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class Language extends DataModel
{
    /**
     * @var Identity Unique language id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var bool Flag default language for frontend. Exact 1 language must be marked as default.
     * @Serializer\Type("boolean")
     */
    protected $isDefault = false;

    /**
     * @var string Locale
     * @Serializer\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string English term
     * @Serializer\Type("string")
     */
    protected $nameEnglish = '';

    /**
     * @var string German term
     * @Serializer\Type("string")
     */
    protected $nameGerman = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique language id
     * @return \jtl\Connector\Model\Language
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  bool $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
     * @return \jtl\Connector\Model\Language
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $nameEnglish English term
     * @return \jtl\Connector\Model\Language
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

 
}
