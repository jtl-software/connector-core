<?php
namespace Jtl\Connector\Test\Core\Utilities;

use Jtl\Connector\Core\Utilities\Str;
use PHPUnit\Framework\TestCase;

/**
 * Class StrTest
 * @package Jtl\Connector\Test\Core\Utilities
 */
class StrTest extends TestCase
{

    /**
     * @dataProvider toCamelCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     * @throws \Exception
     */
    public function testToCamelCase($data, $expectedResult)
    {
        $this->assertSame($expectedResult,Str::toCamelCase($data));
    }

    /**
     * @return array
     */
    public function toCamelCaseDataProvider(): array
    {
        return [
            ['camel_case', 'camelCase'],
            [false, ''],
            ['', ''],
            ['_snake_case_', 'snakeCase_'],
            ['snake__case', 'snake_Case'],
            [12345, '12345'],
            ['    ', '    '],
            ['sna\\ke', 'sna\\ke']
        ];
    }

    /**
     * @dataProvider toPascalCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     * @throws \Exception
     */
    public function testPascalCase($data, $expectedResult)
    {
        $this->assertSame($expectedResult,Str::toPascalCase($data));
    }

    /**
     * @return array
     */
    public function toPascalCaseDataProvider(): array
    {
        return [
            ['camel_case', 'CamelCase'],
            [false, ''],
            ['', ''],
            ['_snake_case_', 'SnakeCase_'],
            ['snake__case', 'Snake_Case'],
            [12345, '12345'],
            ['    ', '    '],
            ['sna\\ke', 'Sna\\ke']
        ];
    }

    /**
     * @dataProvider toSnakeCaseDataProvider
     *
     * @param mixed $data
     * @param mixed $expectedResult
     * @throws \Exception
     */
    public function testSnakeCase($data, $expectedResult)
    {
        $this->assertSame($expectedResult,Str::toSnakeCase($data));
    }

    /**
     * @return array
     */
    public function toSnakeCaseDataProvider(): array
    {
        return [
            ['snake_case', 'snake_case'],
            [false, ''],
            ['', ''],
            ['_snake_case_', '_snake_case_'],
            ['snake__case', 'snake__case'],
            [12345, '1_2_3_4_5'],
            ['    ', '    '],
            ['sna\\ke', 'sna\\ke']
        ];
    }



}