<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Compression
 */

namespace Jtl\Connector\Core\IO;

class Temp
{
    /**
     * @var string
     */
    protected $connectorDir;

    /**
     * Temp constructor.
     * @param string $connectorDir
     */
    public function __construct(string $connectorDir)
    {
        $this->connectorDir = $connectorDir;
    }

    /**
     * @param string ...$path
     * @return string
     * @throws \Exception
     */
    public function createDirectory(string ...$path): string
    {
        if (empty($path)) {
            $path = [$this->getDirectory(), 'con-' . uniqid()];
        }

        $dir = implode('/', $path);
        if (mkdir($dir)) {
            return $dir;
        }

        throw new \Exception(sprintf('Could not create temp dir \'%s\'', $dir));
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getDirectory(): string
    {
        $dir = sys_get_temp_dir();
        if (!is_writeable($dir)) {
            $dir = sprintf('%s/tmp', $this->connectorDir);
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
