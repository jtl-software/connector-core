<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Tests\Model;

use Exception;
use JMS\Serializer\Exception\InvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\SerializationContext;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;

class ModelTest extends TestCase
{
    /**
     * @dataProvider modelsDataProvider
     * @doesNotPerformAssertions
     *
     * @param string $modelName
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testModelsInitialization(string $modelName): void
    {
        $serializer         = SerializerBuilder::create()->build();
        $fullModelClassName = \sprintf("%s\\%s", Model::MODEL_NAMESPACE, $modelName);
        $obj                = new $fullModelClassName();
        $context            = (new SerializationContext())->setSerializeNull(true);
        $serializer->toArray($obj, $context);
    }

    /**
     * @return array<mixed>
     * @throws AssertionFailedError
     */
    public function modelsDataProvider(): array
    {
        $this->fail('TODO ARRAY DOC!!!');
        $ignoredModels = self::getIgnoredModels(); //@phpstan-ignore-line
        $modelsPattern = \dirname(\TEST_DIR) . '/src/Model/*.php';
        return \array_filter(
            \array_map(static function ($modelPath) {
                $fileInfo  = new \SplFileInfo($modelPath);
                $modelName = $fileInfo->getBasename('.php');
                return [$modelName];
            }, \glob($modelsPattern)),
            static function ($value) use ($ignoredModels) {
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
     *
     * @throws Exception
     */
    public function testUnsetIdentificationString(string $identificationString, string $subject, bool $setString): void
    {
        $model       = $this->getMockForAbstractClass(AbstractModel::class);
        $stringCount = \random_int(0, 10);

        $identificationStrings = \array_map(static function ($whatever) {
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
        /** @var string[] $actualResult */
        $actualResult = $this->getPropertyValueFromObject($model, 'identificationStrings');
        $this->assertNotContains($identificationString, $actualResult);
        $this->assertCount($stringCount, $actualResult);
    }

    /**
     * @dataProvider unsetIdentificationStringProvider
     *
     * @param string $identificationString
     * @param string $subject
     * @param bool   $setString
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     */
    public function testUnsetIdentificationStringBySubject(
        string $identificationString,
        string $subject,
        bool   $setString
    ): void {
        $model       = $this->getMockForAbstractClass(AbstractModel::class);
        $stringCount = \random_int(0, 10);

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
                switch (\random_int(0, 1)) {
                    case 0:
                        $model->setIdentificationString($string);
                        break;
                    case 1:
                        $model->setIdentificationStringBySubject(\uniqid('sub-', false), $string);
                        break;
                }
            }
        }

        $model->unsetIdentificationStringBySubject($subject);
        /** @var string[] $actualResult */
        $actualResult = $this->getPropertyValueFromObject($model, 'identificationStrings');
        $this->assertNotContains($identificationString, $actualResult);
        $this->assertArrayNotHasKey($subject, $actualResult);
        $this->assertCount($stringCount, $actualResult);
    }

    /**
     * @return array{
     *     0: array{0: string, 1: 'hola', 2: true},
     *     1: array{0: string, 1: 'hallo', 2: false}
     *  }
     */
    public function unsetIdentificationStringProvider(): array
    {
        return [
            [\uniqid('foo-', false), 'hola', true],
            [\uniqid('bar-', false), 'hallo', false]
        ];
    }
}
