<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized name for specific..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Specific
 */
class SpecificI18n extends DataModel
{
    /**
     * @var Identity Reference to specific
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $specificId = null;

    /**
     * @var string Locale
     * @Serializer\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Localized name
     * @Serializer\Type("string")
     */
    protected $name = '';


    public function __construct()
    {
        $this->specificId = new Identity;
    }

    /**
     * @param  Identity $specificId Reference to specific
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        return $this->setProperty('specificId', $specificId, 'Identity');
    }

    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId()
    {
        return $this->specificId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\SpecificI18n
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
     * @param  string $name Localized name
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
