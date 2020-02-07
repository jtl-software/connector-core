<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * TranslatableAttribute class
 *
 * @access public
 * @package Jtl\Connector\Core\Model\TranslatableAttribute
 * @Serializer\AccessType("public_method")
 */
class TranslatableAttribute extends AbstractIdentity
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
     * @var TranslatableAttributeI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TranslatableAttributeI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * @param bool $isTranslated
     * @return TranslatableAttribute
     */
    public function setIsTranslated(bool $isTranslated): TranslatableAttribute
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
     * @return TranslatableAttribute
     */
    public function setIsCustomProperty(bool $isCustomProperty): TranslatableAttribute
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
     * @return TranslatableAttributeI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param TranslatableAttributeI18n $i18n
     * @return TranslatableAttribute
     */
    public function addI18n(TranslatableAttributeI18n $i18n): TranslatableAttribute
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return TranslatableAttribute
     */
    public function clearI18ns(): TranslatableAttribute
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param TranslatableAttributeI18n ...$i18ns
     * @return TranslatableAttribute
     */
    public function setI18ns(TranslatableAttributeI18n ...$i18ns): TranslatableAttribute
    {
        $this->i18ns = $i18ns;

        return $this;
    }
}
