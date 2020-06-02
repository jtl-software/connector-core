<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Exception
 */
namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Utilities\Str;

/**
 * Class ApplicationException
 * @package Jtl\Connector\Core\Exception
 */
class ApplicationException extends \Exception
{
    public const
        CONNECTOR_DIR_NOT_EXISTS = 10,
        IMAGE_NOT_FOUND = 20;


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
     * @param AbstractImage $image
     * @return ApplicationException
     * @throws \Exception
     */
    public static function imageNotFound(AbstractImage $image): self
    {
        return new static('Image could not get found for %s (hostId = %d)', Str::toPascalCase($image->getRelationType()), $image->getForeignKey()->getHost(), self::IMAGE_NOT_FOUND);
    }

    /**
     * @param AbstractImage $image
     * @return ApplicationException
     * @throws \Exception
     */
    public static function remoteImageNotFound(AbstractImage $image): self
    {
        return new static(sprintf('Remote image (%s) could not get found for %s (hostId = %d', $image->getRemoteUrl(), Str::toPascalCase($image->getRelationType()), $image->getForeignKey()->getHost()), self::IMAGE_NOT_FOUND);
    }

    /**
     * @param string $fileName
     * @return ApplicationException
     */
    public static function canNotCreateFile(string $fileName): self
    {
        return new static(sprintf('File (%s) could not get created. Directory permissions should get checked', $fileName), ErrorCode::SERVER_ERROR);
    }

    /**
     * @return ApplicationException
     */
    public static function fileCouldNotGetExtracted(): self
    {
        return new static('Zip file could not get extracted', ErrorCode::SERVER_ERROR);
    }
}
