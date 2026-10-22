<?php

declare(strict_types=1);

namespace src\Model;

use JsonException;
use Jtl\Connector\Core\Exception\TranslatableAttributeException;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\Generator\TranslatableAttributeI18nFactory;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;

class TranslatableAttributeTest extends TestCase
{
    /**
     * @param string                           $languageIso
     * @param TranslatableAttributeI18n|null   $expectedTranslation
     * @param array<TranslatableAttributeI18n> $translations
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('findTranslationProvider')]
    public function testFindTranslation(
        string                     $languageIso,
        ?TranslatableAttributeI18n $expectedTranslation,
        array                      $translations = []
    ): void {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualTranslation = $attribute->findTranslation($languageIso);

        $this->assertEquals($expectedTranslation, $actualTranslation);
    }

    /**
     * @return array<int, array<int, mixed>>
     * @throws \Exception
     * @throws \RuntimeException
     */
    public static function findTranslationProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');

        /** @var TranslatableAttributeI18n[] $translations */
        $translations      = $translationsFactory->make(\random_int(2, 10));
        $translationsCount = \count($translations);
        if ($translationsCount < 2) {
            throw new \RuntimeException('$translationsCount must be greater than 1.');
        }
        $randomIntMax = $translationsCount - 1;

        return [
            [
                'es',
                $translations[\random_int(0, $randomIntMax)]->setLanguageIso('es'),
                $translations,
            ],
            [
                'notFound',
                $translations[0],
                $translations,
            ],
            [
                'foo',
                null,
            ],
        ];
    }

    /**
     * @param string                         $type
     * @param TranslatableAttributeI18n|null $translation
     * @param mixed                          $expectedValue
     *
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws JsonException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws TranslatableAttributeException
     */
    #[DataProvider('findValueProvider')]
    #[Depends('testSetType')]
    public function testFindValue(string $type, ?TranslatableAttributeI18n $translation, mixed $expectedValue): void
    {
        $attribute = $this->createPartialMock(TranslatableAttribute::class, ['findTranslation']);

        $languageIso = 'foo';

        $attribute
            ->expects($this->once())
            ->method('findTranslation')
            ->with($languageIso)
            ->willReturn($translation);

        $attribute->setType($type);

        $actualValue = $attribute->findValue($languageIso);

        $this->assertEquals($expectedValue, $actualValue);
    }

    /**
     * @return array<int, array<int, string|AbstractModel|int|null>>
     * @throws \Exception
     */
    public static function findValueProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');

        return [
            [
                'int',
                $translationsFactory->makeOne(['value' => '123']),
                123,
            ],
            [
                'string',
                null,
                null,
            ],
        ];
    }

    /**
     * @param array<TranslatableAttributeI18n> $translations
     * @param string                           $expectedName
     * @param string                           $languageIso
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('getNameProvider')]
    public function testGetName(array $translations, string $expectedName, string $languageIso): void
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualName = $attribute->getName($languageIso);

        $this->assertEquals($expectedName, $actualName);
    }

    /**
     * @return array<int, array{0: TranslatableAttributeI18n[], 1: string, 2: string}>
     * @throws \Exception
     */
    public static function getNameProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');
        $rounds              = \random_int(1, 5);
        $translations        = [];

        $data = [];
        for ($i = 0; $i < $rounds; $i++) {
            /** @var TranslatableAttributeI18n[] $translations */
            $translations = $translationsFactory->make(\random_int(1, 5));
            $randomIntMax = \count($translations) - 1;

            if ($randomIntMax < 1) {
                $selected = 0;
            } else {
                $selected = \random_int(0, $randomIntMax);
            }

            $data[] = [
                $translations,
                $translations[$selected]->getName(),
                $translations[$selected]->getLanguageIso(),
            ];
        }

        $data[] = [
            $translations,
            $translations[0]->getName(),
            '',
        ];

        return $data;
    }

    /**
     * @param TranslatableAttributeI18n[]                      $translations
     * @param array<string, bool|float|int|string|object|null> $expectedValues
     * @param string|null                                      $castToType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws JsonException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws TranslatableAttributeException
     */
    #[DataProvider('getValuesProvider')]
    public function testGetValues(array $translations, array $expectedValues, ?string $castToType = null): void
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualValues = $attribute->getValues($castToType);

        $this->assertEquals($expectedValues, $actualValues);
    }

    /**
     * @return array<int, array{0: TranslatableAttributeI18n[], 1: array<string, string>}>
     * @throws \Exception
     */
    public static function getValuesProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');
        $rounds              = \random_int(1, 5);

        $data = [];
        for ($i = 0; $i < $rounds; $i++) {
            /** @var TranslatableAttributeI18n[] $translations */
            $translations   = $translationsFactory->make(\random_int(1, 5));
            $expectedValues = [];
            foreach ($translations as $translation) {
                $expectedValues[$translation->getLanguageIso()] = $translation->getValueAsString();
            }

            $data[] = [
                $translations,
                $expectedValues,
            ];
        }

        return $data;
    }

    /**
     * @param string $actualType
     * @param string $expectedType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('setTypeProvider')]
    public function testSetType(string $actualType, string $expectedType): void
    {
        $attribute = new TranslatableAttribute();
        $attribute->setType($actualType);

        $this->assertEquals($expectedType, $attribute->getType());
    }

    /**
     * @return array<int, array<int, bool|string>>
     */
    public static function setTypeProvider(): array
    {
        $data = [];
        foreach (TranslatableAttribute::getTypes() as $type) {
            $data[] = [
                $type,
                $type,
            ];
        }

        return \array_merge($data, [
            //invalid types, should fall back to string
            [
                'something invalid',
                TranslatableAttribute::TYPE_STRING,
            ],
            [
                '',
                TranslatableAttribute::TYPE_STRING,
            ]
        ]);
    }
}
