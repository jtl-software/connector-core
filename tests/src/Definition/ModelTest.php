<?php
namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\DefinitionException;
use PHPUnit\Framework\TestCase;

/**
 * Class ModelTest
 * @package Jtl\Connector\Core\Test\Definition
 */
class ModelTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testPropertyMappingsMatchModelIdentities()
    {
        $modelNamespace = 'Jtl\\Connector\\Core\\Model';

        $definition = new Model();
        $definitionReflection = new \ReflectionClass($definition);
        $propertyMappings = $definitionReflection->getProperty('propertyMappings');
        $propertyMappings->setAccessible(true);

        $exceptions = [
            Model::PRODUCT_ATTRIBUTE
        ];

        $mappings = $propertyMappings->getValue($definition);

        foreach ($mappings as $modelName => $identityMappings) {
            if (in_array($modelName, $exceptions, true)) {
                continue;
            }

            $modelClass = sprintf("%s\\%s", $modelNamespace, $modelName);
            $model = new $modelClass;

            foreach ($identityMappings as $propertyName => $identityType) {
                $this->assertObjectHasAttribute($propertyName, $model);
            }
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function testMappingsMatchIdentityType()
    {
        $definition = new Model();
        $definitionReflection = new \ReflectionClass($definition);
        $propertyMappings = $definitionReflection->getProperty('mappings');
        $propertyMappings->setAccessible(true);

        foreach ($propertyMappings->getValue($definition) as $mapping) {
            $this->assertTrue(IdentityType::isType($mapping));
        }
    }

    /**
     * @dataProvider getModelByTypeProvider
     *
     * @param int $identityType
     * @param $expectedResult
     * @param bool $shouldThrowException
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testGetModelByType(int $identityType, $expectedResult, bool $shouldThrowException = false)
    {
        if ($shouldThrowException) {
            $this->expectExceptionObject($expectedResult);
        }

        $result = Model::getModelByType($identityType);

        if ($shouldThrowException === false) {
            $this->assertSame($expectedResult, $result);
        }
    }

    /**
     * @return array
     */
    public function getModelByTypeProvider(): array
    {
        return [
            [IdentityType::CATEGORY, Model::CATEGORY],
            [0, DefinitionException::unknownIdentityType(0), true],
            [-999999999999999999, DefinitionException::unknownIdentityType(-999999999999999999), true],
            [IdentityType::SPECIFIC_VALUE_IMAGE, Model::SPECIFIC_VALUE_IMAGE],
        ];
    }

    /**
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testGetIdentityTypeModelIsInvalid()
    {
        $modelName = "InvalidModelName";

        $this->expectExceptionObject(DefinitionException::unknownModel($modelName));

        Model::getIdentityType($modelName);
    }

    /**
     * @dataProvider isIdentityPropertyProvider
     *
     * @param string $modelName
     * @param string $propertyName
     * @param bool $expectedResult
     */
    public function testIsIdentityPropertyInvalidPropertyName(
        string $modelName,
        string $propertyName,
        bool $expectedResult
    ) {
        $result = Model::isIdentityProperty($modelName, $propertyName);
        $this->assertSame($expectedResult, $result);
    }

    /**
     * @return array
     */
    public function isIdentityPropertyProvider(): array
    {
        return [
            [Model::SHIPMENT, 'id', false],
            [Model::PRODUCT, 'id', true],
            [Model::PRODUCT, 'id ', false],
            [Model::PRODUCT, ' ', false],
            [Model::PRODUCT, 'ID', false],
            [Model::CATEGORY, 'ID', false],
            [Model::CATEGORY, 'id', true],
        ];
    }

    /**
     * @dataProvider modelNameProvider
     *
     * @param string $modelName
     * @param bool $expectedResult
     */
    public function testIsModel(string $modelName, bool $expectedResult)
    {
        $this->assertEquals($expectedResult, Model::isModel($modelName));
    }

    /**
     * @dataProvider modelNameProvider
     *
     * @param string $modelName
     * @param bool $isModelName
     * @throws DefinitionException
     */
    public function testGetRelationType(string $modelName, bool $isModelName)
    {
        if(!$isModelName) {
            $this->expectExceptionObject(DefinitionException::unknownModel($modelName));
        }

        $this->assertEquals(lcfirst($modelName), Model::getRelationType($modelName));
    }

    /**
     * @return array
     */
    public function modelNameProvider(): array
    {
        return [
            [Model::PRODUCT, true],
            [Model::CATEGORY, true],
            [Model::PRODUCT_TO_CATEGORY, true],
            [Model::UNIT, true],
            [Model::MANUFACTURER, true],
            [Model::MANUFACTURER_IMAGE, true],
            ['Product2Categoryy', false],
            [' Product2Category', false],
            ['PRODUCT2CATEGORY', false],
            [Model::SHIPMENT, true]
        ];
    }
}
