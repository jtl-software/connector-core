<?php

namespace Jtl\Connector\Core\Tests\Model;

use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

class ModelTest extends TestCase
{
    /**
     * @dataProvider modelsDataProvider
     * @doesNotPerformAssertions
     *
     * @param string $modelName
     */
    public function testModelsInitialization(string $modelName)
    {
        $serializer = SerializerBuilder::create()->build();
        $fullModelClassName = sprintf("%s\\%s", Model::MODEL_NAMESPACE, $modelName);
        $obj = new $fullModelClassName();
        $context = (new SerializationContext())->setSerializeNull(true);
        $serializer->toArray($obj, $context);
    }

    /**
     * @dataProvider identificationModelsDataProvider
     * @param string $modelName
     * @param int $count
     */
    public function testIdentificationStrings(string $modelName, int $count)
    {
        $fullModelClassName = sprintf("%s\\%s", Model::MODEL_NAMESPACE, $modelName);
        $obj = new $fullModelClassName();
        $obj->setIdentificationString("Fooo");
        $identificationStrings = $obj->getIdentificationStrings('de');
        $this->assertCount($count, $identificationStrings, sprintf('Model %s', $modelName));
    }

    /**
     * @return string[]
     */
    public static function getIgnoredModels(): array
    {
        return [
            'AbstractModel',
            'AbstractI18n',
            'AbstractIdentity',
            'AbstractImage',
            'AbstractModel',
            'AbstractOrderAddress',
            'IdentificationInterface',
            'IdentityInterface',
            'I18nInterface',
            'FeatureEntity',
            'FeatureFlag',
            'TranslatableAttributesInterface',
            'TranslatableAttributesTrait',
        ];
    }

    /**
     * @return string[]
     */
    public static function identificationModelsDataProvider(): array
    {
        return [
            ['Category', 1],
            ['Customer', 1],
            ['CustomerGroup', 1],
            ['DeliveryNote', 2],
            ['Manufacturer', 1],
            ['Product', 1],
            ['Specific', 1],
            ['StatusChange', 2],
            ['ProductImage', 2],
            ['CategoryImage', 2],
        ];
    }

    /**
     * @return array
     */
    public function modelsDataProvider(): array
    {
        $ignoredModels = self::getIgnoredModels();
        $modelsPattern = dirname(TEST_DIR) . '/src/Model/*.php';
        return array_filter(array_map(function ($modelPath) {
            $fileInfo = new \SplFileInfo($modelPath);
            $modelName = $fileInfo->getBasename('.php');
            return [$modelName];
        }, glob($modelsPattern)), function ($value) use ($ignoredModels) {
            return !in_array($value[0], $ignoredModels, true);
        });
    }
}
