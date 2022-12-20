<?php

namespace src\Model;

use Jtl\Connector\Core\Exception\TranslatableAttributeException;
use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\Generator\TranslatableAttributeI18nFactory;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;

class TranslatableAttributeTest extends TestCase
{
    /**
     * @dataProvider findTranslationProvider
     *
     * @param string $languageIso
     * @param        $expectedTranslation
     * @param array  $translations
     */
    public function testFindTranslation(string $languageIso, $expectedTranslation, array $translations = []): void
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualTranslation = $attribute->findTranslation($languageIso);

        $this->assertEquals($expectedTranslation, $actualTranslation);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function findTranslationProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');

        /** @var TranslatableAttributeI18n[] $translations */
        $translations      = $translationsFactory->make(\mt_rand(1, 10));
        $translationsCount = \count($translations);

        return [
            [
                'es',
                $translations[\random_int(0, $translationsCount - 1)]->setLanguageIso('es'),
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
     * @dataProvider findValueProvider
     *
     * @param string                         $type
     * @param TranslatableAttributeI18n|null $translation
     * @param                                $expectedValue
     *
     * @depends      testSetType
     * @throws TranslatableAttributeException
     */
    public function testFindValue(string $type, ?TranslatableAttributeI18n $translation, $expectedValue): void
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
     * @return array[]
     * @throws \Exception
     */
    public function findValueProvider(): array
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
     * @dataProvider getNameProvider
     *
     * @param array  $translations
     * @param string $expectedName
     * @param string $languageIso
     */
    public function testGetName(array $translations, string $expectedName, string $languageIso): void
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualName = $attribute->getName($languageIso);

        $this->assertEquals($expectedName, $actualName);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getNameProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');
        $rounds              = \random_int(1, 5);
        $translations        = [];

        $data = [];
        for ($i = 0; $i < $rounds; $i++) {
            /** @var TranslatableAttributeI18n[] $translations */
            $translations = $translationsFactory->make(\random_int(1, 5));
            $selected     = \random_int(0, \count($translations) - 1);
            $data[]       = [
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
     * @dataProvider getValuesProvider
     *
     * @param string|null $castToType
     * @param array       $translations
     * @param array       $expectedValues
     */
    public function testGetValues(array $translations, array $expectedValues, string $castToType = null): void
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualValues = $attribute->getValues($castToType);

        $this->assertEquals($expectedValues, $actualValues);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getValuesProvider(): array
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
                $expectedValues[$translation->getLanguageIso()] = $translation->getValue();
            }

            $data[] = [
                $translations,
                $expectedValues,
            ];
        }

        return $data;
    }

    /**
     * @param $actualType
     * @param $expectedType
     *
     * @dataProvider setTypeProvider
     * @return void
     */
    public function testSetType($actualType, $expectedType): void
    {
        $attribute = new TranslatableAttribute();
        $attribute->setType($actualType);

        $this->assertEquals($expectedType, $attribute->getType());
    }

    public function setTypeProvider(): array
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
            ],
            [
                false,
                TranslatableAttribute::TYPE_STRING,
            ],
        ]);
    }
}
