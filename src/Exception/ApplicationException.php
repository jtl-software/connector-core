<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Exception
 */
namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Rpc\Error;

/**
 * Class ApplicationException
 * @package Jtl\Connector\Core\Exception
 */
class ApplicationException extends \Exception
{
    const CONNECTOR_DIR_NOT_EXISTS = 10;

    /**
     * @return ApplicationException
     */
    public static function noSession(): self
    {
        return new static('Could not get any Session', ErrorCode::NO_SESSION);
    }

    /**
     * @param string $connectorDir
     * @return ApplicationException
     */
    public static function connectorDirNotExists(string $connectorDir): self
    {
        return new static(sprintf('Connector directory "%s" does not exist', $connectorDir), self::CONNECTOR_DIR_NOT_EXISTS);
    }

    /**
     * @return ApplicationException
     */
    public static function uploadedFileNotFound(): self
    {
        return new static('Uploaded file could not get found. Please check the upload_max_filesize and post_max_size in your php settings', ErrorCode::REQUEST_ERROR);
    }

    /**
     * @return ApplicationException
     */
    public static function fileCouldNotGetExtracted(): self
    {
        return new static('Zip file could not get extracted', ErrorCode::SERVER_ERROR);
    }
}
