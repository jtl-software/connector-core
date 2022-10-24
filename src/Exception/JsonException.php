<?php

/**
 * @author Immanuel Klinkenberg <immanuel.klinkenberg@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 *
 * Created at 15.05.2019 09:06
 */

namespace Jtl\Connector\Core\Exception;

class JsonException extends \RuntimeException
{
    public const ENCODING_ERROR = 10;
    public const DECODING_ERROR = 20;

    /**
     * @param string $lastErrorMessage
     * @return JsonException
     */
    public static function encoding($lastErrorMessage)
    {
        return new self(\sprintf("Error while encoding into JSON: %s", $lastErrorMessage), static::ENCODING_ERROR);
    }

    /**
     * @param string $lastErrorMessage
     * @param string $jsonString|null
     * @return JsonException
     */
    public static function decoding($lastErrorMessage, $jsonString = null)
    {
        $msg = \sprintf("Error while decoding JSON: %s", $lastErrorMessage);
        if (!\is_null($jsonString)) {
            $msg = \sprintf("Error while decoding JSON: %s" . \PHP_EOL . "String: %s", $lastErrorMessage, $jsonString);
        }
        return new self($msg, static::DECODING_ERROR);
    }
}
