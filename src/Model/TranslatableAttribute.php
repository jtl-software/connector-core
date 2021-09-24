<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\TranslatableAttributeException;

/**
 * TranslatableAttribute class
 *
 * @access public
 * @package Jtl\Connector\Core\Model\TranslatableAttribute
 * @Serializer\AccessType("public_method")
 */
class TranslatableAttribute extends AbstractIdentity
{
    public const
        TYPE_BOOL = 'bool',
        TYPE_FLOAT = 'float',
        TYPE_INT = 'int',
        TYPE_JSON = 'json',
        TYPE_STRING = 'string';

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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = self::TYPE_STRING;

    /**
     * @var TranslatableAttributeI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TranslatableAttributeI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * @var string[]
     * @Serializer\Exclude
     */
    protected static $types = [
        self::TYPE_BOOL,
        self::TYPE_FLOAT,
        self::TYPE_INT,
        self::TYPE_JSON,
        self::TYPE_STRING,
    ];

    /**
     * @param bool $isTranslated
     * @return TranslatableAttribute
     */
    public function setIsTranslated(bool $isTranslated): self
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
    public function setIsCustomProperty(bool $isCustomProperty): self
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     * @throws TranslatableAttributeException
     */
    public function setType(string $type): self
    {
        if (!self::isType($type)) {
            throw TranslatableAttributeException::typeUnknown($type);
        }

        $this->type = $type;

        return $this;
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
    public function addI18n(TranslatableAttributeI18n $i18n): self
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return TranslatableAttribute
     */
    public function clearI18ns(): self
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param TranslatableAttributeI18n ...$i18ns
     * @return TranslatableAttribute
     */
    public function setI18ns(TranslatableAttributeI18n ...$i18ns): self
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @param string $languageIso
     * @return string
     */
    public function getName(string $languageIso = ''): string
    {
        $translation = $this->findTranslation($languageIso);
        if ($translation !== null) {
            return $translation->getName();
        }

        return '';
    }

    /**
     * @param string $languageIso
     * @return TranslatableAttributeI18n|null
     */
    public function findTranslation(string $languageIso): ?TranslatableAttributeI18n
    {
        $i18n = null;
        foreach (array_reverse($this->i18ns) as $i18n) {
            if ($i18n->getLanguageIso() === $languageIso) {
                break;
            }
        }

        return $i18n;
    }

    /**
     * @param string $languageIso
     * @param string|null $castToType
     * @return bool|float|int|string|null
     * @throws TranslatableAttributeException
     */
    public function findValue(string $languageIso, string $castToType = null)
    {
        if ($castToType === null) {
            $castToType = $this->type;
        }

        $i18n = $this->findTranslation($languageIso);
        if ($i18n instanceof TranslatableAttributeI18n) {
            return $i18n->getValue($castToType);
        }

        return null;
    }

    /**
     * @param string|null $castToType
     * @return array
     * @throws TranslatableAttributeException
     */
    public function getValues(string $castToType = null): array
    {
        if ($castToType === null) {
            $castToType = $this->type;
        }

        $values = [];
        foreach ($this->i18ns as $i18n) {
            $values[$i18n->getLanguageIso()] = $i18n->getValue($castToType);
        }

        return $values;
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function isType(string $type): bool
    {
        return in_array($type, self::$types, true);
    }
}
