<?php
namespace Jtl\Connector\Core\IO;

class Path
{
    /**
     * @param string ...$pathParts
     * @return string
     */
    public static function combine(string ...$pathParts): string
    {
        if (count($pathParts) == 0) {
            throw new \InvalidArgumentException('empty or invalid paths');
        }

        $root = substr($pathParts[0], 0, 1) === '/' ? '/' : '';

        $pathParts = array_map(function(string $part) {
            return trim(trim($part), '\\/');
        }, $pathParts);

        return $root . implode('/', $pathParts);
    }
}
