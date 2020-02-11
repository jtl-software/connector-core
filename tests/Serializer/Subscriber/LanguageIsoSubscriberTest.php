<?php
namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use Jtl\Connector\Core\Model\AbstractI18n;
use Jtl\Connector\Core\Model\CategoryI18n;
use Jtl\Connector\Core\Model\CrossSellingGroupI18n;
use Jtl\Connector\Core\Model\ImageI18n;
use Jtl\Connector\Core\Model\ProductI18n;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class LanguageIsoSubscriberTest
 * @package Jtl\Connector\Core\Test\Serializer\Subscriber
 */
class LanguageIsoSubscriberTest extends TestCase
{
    /**
     * @return array
     */
    public function i18NDataProvider()
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
     * @dataProvider i18NDataProvider
     * @param $model
     */
    public function testOnPostSerializeWithInvalidValue(string $model)
    {
        $i18nModel = new $model;
        $i18nModel->setLanguageIso('___');

        $serializedData = $this->serializeModel($i18nModel);

        $jsonObj = json_decode($serializedData);
        $this->assertObjectNotHasAttribute('languageISO', $jsonObj);
        $this->assertObjectHasAttribute('languageIso', $jsonObj);
    }

    /**
     * @dataProvider i18NDataProvider
     * @param $model
     */
    public function testOnPostSerializeWithEmptyValue(string $model)
    {
        $i18nModel = new $model;
        $i18nModel->setLanguageIso("");

        $serializedData = $this->serializeModel($i18nModel);

        $jsonObj = json_decode($serializedData);
        $this->assertObjectHasAttribute('languageISO', $jsonObj);
        $this->assertObjectHasAttribute('languageIso', $jsonObj);
        $this->assertSame($jsonObj->languageIso, '');
    }

    /**
     * @dataProvider i18NDataProvider
     * @param $model
     */
    public function testOnPostSerializeWithValidValue(string $model)
    {
        $i18nModel = new $model;
        $i18nModel->setLanguageIso('de');

        $serializedData = $this->serializeModel($i18nModel);

        $jsonObj = json_decode($serializedData);

        $this->assertObjectHasAttribute('languageISO', $jsonObj);
        $this->assertEquals('ger', $jsonObj->languageISO);
    }

    /**
     * @dataProvider i18NDataProvider
     * @param string $model
     */
    public function testOnPostSerializeWithNoValue(string $model)
    {
        $i18nModel = new $model;

        $serializedData = $this->serializeModel($i18nModel);

        $jsonObj = json_decode($serializedData);

        $this->assertObjectHasAttribute('languageISO', $jsonObj);
        $this->assertEquals('', $jsonObj->languageISO);
    }

    /**
     * @dataProvider i18NDataProvider
     * @param $model
     */
    public function testOnPreDeserializeWithValidValue(string $model)
    {
        $i18nModel = new $model;
        $i18nModel->setLanguageIso('de');

        /** @var $deserializeData ProductI18n */
        $deserializeData = $this->serializeAndDeserializeModel($i18nModel);

        $this->assertObjectHasAttribute('languageIso', $deserializeData);
        $this->assertSame($deserializeData->getLanguageIso(), 'de');
    }

    /**
     * @dataProvider i18NDataProvider
     * @param $model
     */
    public function testOnPreDeserializeWithInValidValue(string $model)
    {
        $value = '_____';

        $i18nModel = new $model;
        $i18nModel->setLanguageIso($value);

        /** @var $deserializeData ProductI18n */
        $deserializeData = $this->serializeAndDeserializeModel($i18nModel);

        $this->assertObjectHasAttribute('languageIso', $deserializeData);
        $this->assertSame($deserializeData->getLanguageIso(), $value);
    }

    /**
     * @param AbstractI18n $i18nModel
     * @return mixed
     */
    protected function serializeAndDeserializeModel(AbstractI18n $i18nModel)
    {
        $serializer = SerializerBuilder::getInstance()->build();
        return $serializer->deserialize($serializer->serialize($i18nModel, 'json'), ProductI18n::class, 'json');
    }

    /**
     * @param AbstractI18n $i18nModel
     * @return string
     */
    protected function serializeModel(AbstractI18n $i18nModel): string
    {
        $serializer = SerializerBuilder::getInstance()->build();
        return $serializer->serialize($i18nModel, 'json');
    }
}