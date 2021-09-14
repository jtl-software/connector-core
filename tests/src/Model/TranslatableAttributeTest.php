<?php

namespace src\Model;

use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\Generator\TranslatableAttributeI18nFactory;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;

class TranslatableAttributeTest extends TestCase
{
    /**
     * @dataProvider findTranslationsProvider
     *
     * @param string $languageIso
     * @param $expectedTranslation
     * @param array $translations
     */
    public function testFindTranslation(string $languageIso, $expectedTranslation, array $translations = [])
    {
        $attribute = (new TranslatableAttribute())
            ->setI18ns(...$translations);

        $actualTranslation = $attribute->findTranslation($languageIso);

        $this->assertEquals($expectedTranslation, $actualTranslation);
    }

    /**
     * @return array
     */
    public function findTranslationsProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');

        /** @var TranslatableAttributeI18n[] $translations */
        $translations = $translationsFactory->make(mt_rand(1, 10));
        $translationsCount = count($translations);

        return [
            ['es', $translations[mt_rand(0, $translationsCount - 1)]->setLanguageIso('es'), $translations],
            ['notFound', $translations[0], $translations],
            ['foo', null],
        ];
    }

    /**
     * @dataProvider findCastedValueProvider
     *
     * @param string $type
     * @param TranslatableAttributeI18n|null $translation
     * @param $expectedValue
     */
    public function testFindCastedValue(string $type, ?TranslatableAttributeI18n $translation, $expectedValue)
    {
        $attribute = $this->createPartialMock(TranslatableAttribute::class, ['findTranslation']);

        $languageIso = 'foo';

        $attribute
            ->expects($this->once())
            ->method('findTranslation')
            ->with($languageIso)
            ->willReturn($translation);

        $attribute->setType($type);

        $actualValue = $attribute->findCastedValue($languageIso);

        $this->assertEquals($expectedValue, $actualValue);
    }

    /**
     * @return array[]
     * @throws \Exception
     */
    public function findCastedValueProvider(): array
    {
        /** @var TranslatableAttributeI18nFactory $translationsFactory */
        $translationsFactory = AbstractModelFactory::createFactory('TranslatableAttributeI18n');

        return [
            ['int', $translationsFactory->makeOne(['value' => '123']), 123],
            ['string', null, null],
        ];
    }
}
