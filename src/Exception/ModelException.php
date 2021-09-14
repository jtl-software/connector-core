<?php

namespace Jtl\Connector\Core\Exception;

class ModelException extends \Exception
{
    public const
        TRANSLATABLE_ATTRIBUTE_TYPE_UNKNOWN = 10;

    /**
     * @param string $type
     * @return static
     */
    public static function translatableAttributeTypeUnknown(string $type): self
    {
        return new self(sprintf('"%s" is not a valid translatable attribute data type', $type), self::TRANSLATABLE_ATTRIBUTE_TYPE_UNKNOWN);
    }
}
