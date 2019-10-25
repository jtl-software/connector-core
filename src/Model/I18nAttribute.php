<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * I18nAttribute class
 *
 * @access public
 * @package Jtl\Connector\Core\Model\I18nAttribute
 * @Serializer\AccessType("public_method")
 */
class I18nAttribute extends DataModel
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
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    /**
     * @var I18nAttributeI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\I18nAttributeI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * I18nAttribute constructor.
     */
    public function __construct()
    {
        $this->id = new Identity();
    }

    /**
     * @param Identity $id
     * @return I18nAttribute
     */
    public function setId(Identity $id): I18nAttribute
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
     * @return I18nAttribute
     */
    public function setIsTranslated(bool $isTranslated): I18nAttribute
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
     * @return I18nAttribute
     */
    public function setIsCustomProperty(bool $isCustomProperty): I18nAttribute
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

    /**
     * @return I18nAttributeI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param I18nAttributeI18n $i18n
     * @return I18nAttribute
     */
    public function addI18n(I18nAttributeI18n $i18n): I18nAttribute
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return I18nAttribute
     */
    public function clearI18ns(): I18nAttribute
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param I18nAttributeI18n ...$i18ns
     * @return I18nAttribute
     */
    public function setI18ns(I18nAttributeI18n ...$i18ns): I18nAttribute
    {
        $this->i18ns = $i18ns;

        return $this;
    }

}
