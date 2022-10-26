<?php

namespace Jtl\Connector\Core\Tests\Model;

use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Category;
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
        $serializer         = SerializerBuilder::create()->build();
        $fullModelClassName = \sprintf("%s\\%s", Model::MODEL_NAMESPACE, $modelName);
        $obj                = new $fullModelClassName();
        $context            = (new SerializationContext())->setSerializeNull(true);
        $serializer->toArray($obj, $context);
    }

    /**
     * @return array
     */
    public function modelsDataProvider(): array
    {
        $ignoredModels = self::getIgnoredModels();
        $modelsPattern = \dirname(\TEST_DIR) . '/src/Model/*.php';
        return \array_filter(
            \array_map(function ($modelPath) {
                $fileInfo  = new \SplFileInfo($modelPath);
                $modelName = $fileInfo->getBasename('.php');
                return [$modelName];
            }, \glob($modelsPattern)),
            function ($value) use ($ignoredModels) {
                return !\in_array($value[0], $ignoredModels, true);
            }
        );
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
     * @dataProvider unsetIdentificationStringProvider
     *
     * @param string $identificationString
     * @param string $subject
     * @param bool   $setString
     */
    public function testUnsetIdentificationString(string $identificationString, string $subject, bool $setString)
    {
        $model       = $this->getMockForAbstractClass(AbstractModel::class);
        $stringCount = \mt_rand(0, 10);

        $identificationStrings = \array_map(function ($whatever) {
            return \uniqid('rand-', true);
        }, \array_fill(0, $stringCount, 'foo'));

        if ($setString) {
            $identificationStrings = \array_merge($identificationStrings, [$identificationString]);
            \shuffle($identificationStrings);
        }

        foreach ($identificationStrings as $strings) {
            $model->setIdentificationString($strings);
        }

        $model->unsetIdentificationString($identificationString);
        $actualResult = $this->getPropertyValueFromObject($model, 'identificationStrings');
        $this->assertFalse(\in_array($identificationString, $actualResult, true));
        $this->assertCount($stringCount, $actualResult);
    }

    /**
     * @dataProvider unsetIdentificationStringProvider
     *
     * @param string $identificationString
     * @param string $subject
     * @param bool   $setString
     */
    public function testUnsetIdentificationStringBySubject(
        string $identificationString,
        string $subject,
        bool   $setString
    ) {
        $model       = $this->getMockForAbstractClass(AbstractModel::class);
        $stringCount = \mt_rand(0, 10);

        $identificationStrings = \array_map(function ($whatever) {
            return \uniqid('rand-', true);
        }, \array_fill(0, $stringCount, 'foo'));

        if ($setString) {
            $identificationStrings = \array_merge($identificationStrings, [$identificationString]);
            \shuffle($identificationStrings);
        }

        foreach ($identificationStrings as $string) {
            if ($string === $identificationString) {
                $model->setIdentificationStringBySubject($subject, $string);
            } else {
                switch (\mt_rand(0, 1)) {
                    case 0:
                        $model->setIdentificationString($string);
                        break;
                    case 1:
                        $model->setIdentificationStringBySubject(\uniqid('sub-'), $string);
                        break;
                }
            }
        }

        $model->unsetIdentificationStringBySubject($subject);
        $actualResult = $this->getPropertyValueFromObject($model, 'identificationStrings');
        $this->assertFalse(\in_array($identificationString, $actualResult, true));
        $this->assertArrayNotHasKey($subject, $actualResult);
        $this->assertCount($stringCount, $actualResult);
    }

    /**
     * @return array
     */
    public function unsetIdentificationStringProvider(): array
    {
        return [
            [
                \uniqid('foo-'),
                'hola',
                true,
            ],
            [
                \uniqid('bar-'),
                'hallo',
                false,
            ],
        ];
    }
}
