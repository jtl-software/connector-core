<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Compression
 */

namespace Jtl\Connector\Core\IO;

class Temp
{
    /**
     * @param string ...$path
     * @return string
     * @throws \Exception
     */
    public static function createDirectory(string ...$path): string
    {
        if (empty($path)) {
            $path = [self::getDirectory(), 'con-' . uniqid()];
        }

        $dir = Path::combine(...$path);
        if (mkdir($dir)) {
            return $dir;
        }

        throw new \Exception(sprintf('Could not create temp dir \'%s\'', $dir));
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function getDirectory(): string
    {
        $dir = sys_get_temp_dir();
        if (!is_writeable($dir)) {
            if (!defined('CONNECTOR_DIR')) {
                throw new \Exception('Constant CONNECTOR_DIR is not defined');
            }

            $dir = Path::combine(CONNECTOR_DIR, 'tmp');
        }

        if (!is_writeable($dir)) {
            throw new \Exception(sprintf(
                'System temp dir and fallback dir \'%s\' are not writeable',
                $dir
            ));
        }

        return $dir;
    }
}
