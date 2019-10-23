<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */

namespace jtl\Connector\Model;

/**
 * AbstractI18nAttribute class
 *
 * @access public
 * @package jtl\Connector\Model\Common
 * @Serializer\AccessType("public_method")
 */
abstract class AbstractI18nAttribute extends DataModel
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isTranslated")
     * @Serializer\Accessor(getter="getIsTranslated",setter="setIsTranslated")
     */
    protected $isTranslated = false;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isCustomProperty")
     * @Serializer\Accessor(getter="getIsCustomProperty",setter="setIsCustomProperty")
     */
    protected $isCustomProperty = false;

    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * AbstractI18nAttribute constructor.
     */
    public function __construct()
    {
        $this->id = new Identity();
    }

    /**
     * @param Identity $id
     * @return AbstractI18nAttribute
     */
    public function setId(Identity $id): AbstractI18nAttribute
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param bool $isTranslated
     * @return AbstractI18nAttribute
     */
    public function setIsTranslated(bool $isTranslated): AbstractI18nAttribute
    {
        $this->isTranslated = $isTranslated;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsTranslated(): bool
    {
        return $this->isTranslated;
    }

    /**
     * @param bool $isCustomProperty
     * @return AbstractI18nAttribute
     */
    public function setIsCustomProperty(bool $isCustomProperty): AbstractI18nAttribute
    {
        $this->isCustomProperty = $isCustomProperty;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCustomProperty(): bool
    {
        return $this->isCustomProperty;
    }

}