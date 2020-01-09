<?php
namespace Jtl\Connector\Core\Exception;

/**
 * Class SubscriberException
 * @package Jtl\Connector\Core\Exception
 */
class SubscriberException extends \Exception
{
    const INVALID_MODEL_TYPE = 10;

    /**
     * @return SubscriberException
     */
    public static function invalidModelTypeInArray(): SubscriberException
    {
        return new self("Invalid model type in array", self::INVALID_MODEL_TYPE);
    }
}