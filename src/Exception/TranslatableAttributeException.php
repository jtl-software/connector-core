<?php

namespace Jtl\Connector\Core\Exception;

class TranslatableAttributeException extends \Exception
{
    public const
        TYPE_UNKNOWN = 10,
        VALUE_TYPE_INVALID = 20,
        DECODING_VALUE_FAILED = 30;

    /**
     * @param string $type
     * @return TranslatableAttributeException
     */
    public static function typeUnknown(string $type): self
    {
        return new self(sprintf('"%s" is not a valid translatable attribute data type', $type), self::TYPE_UNKNOWN);
    }

    /**
     * @param string $type
     * @return TranslatableAttributeException
     */
    public static function valueTypeInvalid(string $type): self
    {
        return new self(sprintf('"%s" is not a valid translatable attribute value type', $type), self::VALUE_TYPE_INVALID);
    }

    /**
     * @param string $attributeName
     * @param string $errorMessage
     * @return TranslatableAttributeException
     */
    public static function decodingValueFailed(string $attributeName, string $errorMessage): self
    {
        return new self(sprintf('Decoding attribute (%s) value failed: %s', $attributeName, $errorMessage), self::DECODING_VALUE_FAILED);
    }
}
