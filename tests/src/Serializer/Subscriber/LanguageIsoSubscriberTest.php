<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\NotAcceptableException;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Exception\UnsupportedFormatException;
use JsonException;
use Jtl\Connector\Core\Model\AbstractI18n;
use Jtl\Connector\Core\Model\CategoryI18n;
use Jtl\Connector\Core\Model\CrossSellingGroupI18n;
use Jtl\Connector\Core\Model\ImageI18n;
use Jtl\Connector\Core\Model\ProductI18n;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class LanguageIsoSubscriberTest
 *
 * @package Jtl\Connector\Core\Test\Serializer\Subscriber
 */
class LanguageIsoSubscriberTest extends TestCase
{
    /**
     * @return array<int, array{0: class-string}>
     */
    public static function i18NDataProvider(): array
    {
        return [
            [ProductI18n::class],
            [CategoryI18n::class],
            [ImageI18n::class],
            [CrossSellingGroupI18n::class],
            [TranslatableAttributeI18n::class],
        ];
    }

    /**
     * @param class-string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPostSerializeWithInvalidValue(string $model): void
    {
        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $i18nModel->setLanguageIso('___');

        $serializedData = $this->serializeModel($i18nModel);

        /** @var object $jsonObj */
        $jsonObj = \json_decode($serializedData, false, 512, \JSON_THROW_ON_ERROR);
        if (!\property_exists($jsonObj, 'languageISO')) {
            $this->fail('property "languageISO" does not exist.');
        }
        if (!\property_exists($jsonObj, 'languageIso')) {
            $this->fail('property "languageIso" does not exist.');
        }
        $this->assertEquals($jsonObj->languageISO, $jsonObj->languageIso);
    }

    /**
     * @param AbstractI18n $i18nModel
     *
     * @return string
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws UnsupportedFormatException
     */
    protected function serializeModel(AbstractI18n $i18nModel): string
    {
        return SerializerBuilder::create()->build()->serialize($i18nModel, 'json');
    }

    /**
     * @param class-string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPostSerializeWithEmptyValue(string $model): void
    {
        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $i18nModel->setLanguageIso('');

        $serializedData = $this->serializeModel($i18nModel);

        /** @var object $jsonObj */
        $jsonObj = \json_decode($serializedData, false, 512, \JSON_THROW_ON_ERROR);
        if (!\property_exists($jsonObj, 'languageIso')) {
            $this->fail('property "languageIso" does not exist.');
        }
        $this->assertSame($jsonObj->languageIso, '');
    }

    /**
     * @param string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPostSerializeWithValidValue(string $model): void
    {
        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $i18nModel->setLanguageIso('de');

        $serializedData = $this->serializeModel($i18nModel);

        /** @var object $jsonObj */
        $jsonObj = \json_decode($serializedData, false, 512, \JSON_THROW_ON_ERROR);

        if (!\property_exists($jsonObj, 'languageISO')) {
            $this->fail('property "languageISO" does not exist.');
        }
        $this->assertEquals('ger', $jsonObj->languageISO);
    }

    /**
     * @param class-string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPostSerializeWithNoValue(string $model): void
    {
        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $serializedData = $this->serializeModel($i18nModel);

        /** @var object $jsonObj */
        $jsonObj = \json_decode($serializedData, false, 512, \JSON_THROW_ON_ERROR);

        if (!\property_exists($jsonObj, 'languageISO')) {
            $this->fail('property "languageISO" does not exist.');
        }
        $this->assertEquals('', $jsonObj->languageISO);
    }

    /**
     * @param class-string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPreDeserializeWithValidValue(string $model): void
    {
        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $i18nModel->setLanguageIso('de');

        $deserializeData = $this->serializeAndDeserializeModel($i18nModel);

        $this->assertSame($deserializeData->getLanguageIso(), 'de');
    }

    /**
     * @param AbstractI18n $i18nModel
     *
     * @return ProductI18n
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    protected function serializeAndDeserializeModel(AbstractI18n $i18nModel): ProductI18n
    {
        $serializer  = SerializerBuilder::create()->build();
        $productI18n = $serializer->deserialize($serializer->serialize($i18nModel, 'json'), ProductI18n::class, 'json');
        $this->assertInstanceOf(ProductI18n::class, $productI18n);

        return $productI18n;
    }

    /**
     * Reproduces the real-world payload shape sent by JTL-Wawi: only the exchange
     * field "languageISO" is present, "languageIso" is missing entirely.
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws RuntimeException
     * @throws UnsupportedFormatException
     */
    public function testOnPreDeserializeWithEmptyLanguageIsoAndNoLanguageIsoKeyDoesNotThrow(): void
    {
        $serializer  = SerializerBuilder::create()->build();
        $productI18n = $serializer->deserialize(
            \json_encode(['languageISO' => ''], \JSON_THROW_ON_ERROR),
            ProductI18n::class,
            'json'
        );

        $this->assertInstanceOf(ProductI18n::class, $productI18n);
        $this->assertSame('', $productI18n->getLanguageIso());
    }

    /**
     * Same payload shape as JTL-Wawi sends it, but with an actual language code
     * that must still be converted from ISO-639-2b to ISO-639-1.
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws RuntimeException
     * @throws UnsupportedFormatException
     */
    public function testOnPreDeserializeWithValidLanguageIsoAndNoLanguageIsoKeyConverts(): void
    {
        $serializer  = SerializerBuilder::create()->build();
        $productI18n = $serializer->deserialize(
            \json_encode(['languageISO' => 'ger'], \JSON_THROW_ON_ERROR),
            ProductI18n::class,
            'json'
        );

        $this->assertInstanceOf(ProductI18n::class, $productI18n);
        $this->assertSame('de', $productI18n->getLanguageIso());
    }

    /**
     * @param class-string $model
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('i18NDataProvider')]
    public function testOnPreDeserializeWithInValidValue(string $model): void
    {
        $value = '_____';

        $i18nModel = new $model();
        $this->assertInstanceOf(AbstractI18n::class, $i18nModel);
        $i18nModel->setLanguageIso($value);

        $deserializeData = $this->serializeAndDeserializeModel($i18nModel);

        $this->assertSame($deserializeData->getLanguageIso(), $value);
    }

    /**
     * When "languageISO" is absent from the payload, the condition
     * isset($data['languageISO']) is false, so no conversion must occur and
     * languageIso stays at its default empty value.
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws RuntimeException
     * @throws UnsupportedFormatException
     */
    public function testOnPreDeserializeWhenLanguageISOKeyAbsentNoConversionHappens(): void
    {
        $serializer  = SerializerBuilder::create()->build();
        $productI18n = $serializer->deserialize(
            \json_encode([], \JSON_THROW_ON_ERROR),
            ProductI18n::class,
            'json'
        );

        $this->assertInstanceOf(ProductI18n::class, $productI18n);
        $this->assertSame('', $productI18n->getLanguageIso());
    }

    /**
     * When both "languageISO" and "languageIso" are present in the payload,
     * the condition !isset($data['languageIso']) is false, so the subscriber
     * must leave the existing "languageIso" value untouched.
     *
     * @return void
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws RuntimeException
     * @throws UnsupportedFormatException
     */
    public function testOnPreDeserializeWhenBothKeysArePresentLanguageIsoIsNotOverwritten(): void
    {
        $serializer  = SerializerBuilder::create()->build();
        $productI18n = $serializer->deserialize(
            \json_encode(['languageISO' => 'ger', 'languageIso' => 'en'], \JSON_THROW_ON_ERROR),
            ProductI18n::class,
            'json'
        );

        $this->assertInstanceOf(ProductI18n::class, $productI18n);
        $this->assertSame('en', $productI18n->getLanguageIso());
    }
}
