<?php
namespace Jtl\Connector\Test\Core\Definition;

use Jtl\Connector\Core\Definition\ConfigOption;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Test\Core\TestCase;

class ConfigOptionTest extends TestCase
{
    /**
     * @throws DefinitionException
     */
    public function testGetDefaultValueInvalidOptionName()
    {
        $optionName = 'foo';
        $this->expectExceptionObject(DefinitionException::unknownConfigOption($optionName));

        ConfigOption::getDefaultValue($optionName);
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetOptionsHasAllConstants()
    {
        $constants = array_column($this->getCorrectConstantsTestCases(ConfigOption::class), 0);
        $options = ConfigOption::getOptions();

        $this->assertSame($constants, $options);
    }

    /**
     * @dataProvider isOptionDataProvider
     *
     * @param $option
     * @param bool $shouldBeOption
     */
    public function testIsOption($option, bool $shouldBeOption)
    {
        $isOption = ConfigOption::isOption($option);
        $this->assertSame($shouldBeOption, $isOption);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function isOptionDataProvider(): array
    {
        $testCases = $this->getCorrectConstantsTestCases(ConfigOption::class);
        $testCases[] = [' ', false];
        $testCases[] = [false, false];
        $testCases[] = ['foo', false];

        return $testCases;
    }


}