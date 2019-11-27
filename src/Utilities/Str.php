<?php
namespace Jtl\Connector\Core\Utilities;

use CaseHelper\CaseHelperFactory;

class Str
{
    /**
     * @param string $string
     * @return string
     * @throws \Exception
     */
    public static function toCamelCase(string $string): string
    {
        return CaseHelperFactory::make(CaseHelperFactory::INPUT_TYPE_SNAKE_CASE)->toCamelCase($string);
    }

    /**
     * @param string $string
     * @return string
     * @throws \Exception
     */
    public static function toPascalCase(string $string): string
    {
        return CaseHelperFactory::make(CaseHelperFactory::INPUT_TYPE_SNAKE_CASE)->toPascalCase($string);
    }

    /**
     * @param string $string
     * @return string
     * @throws \Exception
     */
    public static function toSnakeCase(string $string): string
    {
        return CaseHelperFactory::make(CaseHelperFactory::INPUT_TYPE_CAMEL_CASE)->toSnakeCase($string);
    }
}