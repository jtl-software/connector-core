<?php

namespace Jtl\Connector\Core\Test\Utilities;

use Jtl\Connector\Core\Utilities\Str;
use PHPUnit\Framework\TestCase;

/**
 * Class StrTest
 * @package Jtl\Connector\Core\Test\Utilities
 */
class StrTest extends TestCase
{
    /**
     * @dataProvider toCamelCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     *
     * @throws \Exception
     */
    public function testToCamelCase($data, $expectedResult): void
    {
        $this->assertSame($expectedResult, Str::toCamelCase($data));
    }

    /**
     * @return array
     */
    public function toCamelCaseDataProvider(): array
    {
        return [
            ['snake_case', 'snakeCase',],
            ['PascalCase', 'pascalCase',],
            ['camelCase', 'camelCase',],
            [false, '',],
            ['', '',],
            ['_snake_case_', 'snakeCase',],
            ['snake__case', 'snakeCase',],
            [12345, '12345',],
            ['    ', '',],
            ['sna\\ke', 'sna\\ke',],
        ];
    }

    /**
     * @dataProvider toPascalCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     *
     * @throws \Exception
     */
    public function testPascalCase($data, $expectedResult): void
    {
        $this->assertSame($expectedResult, Str::toPascalCase($data));
    }

    /**
     * @return array
     */
    public function toPascalCaseDataProvider(): array
    {
        return [
            ['snake_case', 'SnakeCase',],
            ['camelCase', 'CamelCase',],
            ['PascalCase', 'PascalCase',],
            [false, '',],
            ['', '',],
            ['_snake_case_', 'SnakeCase',],
            ['snake__case', 'SnakeCase',],
            [12345, '12345',],
            ['    ', '',],
            ['sna\\ke', 'Sna\\Ke',],
        ];
    }

    /**
     * @dataProvider toSnakeCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     *
     * @throws \Exception
     */
    public function testSnakeCase($data, $expectedResult): void
    {
        $this->assertSame($expectedResult, Str::toSnakeCase($data));
    }

    /**
     * @return array
     */
    public function toSnakeCaseDataProvider(): array
    {
        return [
            ['snake_case', 'snake_case',],
            ['camelCase', 'camel_case',],
            ['PascalCase', 'pascal_case',],
            [false, '',],
            ['', '',],
            ['_snake_case_', 'snake_case',],
            ['snake__case', 'snake_case',],
            [12345, '12345',],
            ['    ', '',],
            ['sna\\ke', 'sna\\ke',],
        ];
    }
}
