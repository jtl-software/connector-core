<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use JsonException;
use Jtl\Connector\Core\Exception\TranslatableAttributeException;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductAttribute;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Model\TranslatableAttributesInterface;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class ObjectTypesSubscriberTest
 *
 * @package Jtl\Connector\Core\Serializer\Subscriber
 */
class ProductAttributeSubscriberTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testOnPostSerializeAppendProductAttrIdToAttributes(): void
    {
        $product = $this->createProduct();

        $attributes = [];

        $this->addTranslatableAttributeI18n($attributes[] = $this->addTranslatableAttribute($product));
        $this->addTranslatableAttributeI18n($attributes[] = $this->addTranslatableAttribute($product));

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        $productObj = \json_decode($serializedProduct, false, 512, \JSON_THROW_ON_ERROR);
        $this->assertInstanceOf(Product::class, $productObj);

        foreach ($productObj->getAttributes()[0]->getI18ns() as $index => $i18n) {
            $attributeId = $attributes[$index]->getId();
            if (!\property_exists($i18n, 'productAttrId')) { //@phpstan-ignore-line
                $this->fail('property \'productAttrId\' does not exist.');
            }
            $this->assertSame([$attributeId->getEndpoint(), $attributeId->getHost()], $i18n->productAttrId);
        }
    }

    /**
     * @return Product
     * @throws \Exception
     */
    protected function createProduct(): Product
    {
        $productId = new Identity($this->createEndpointId(), $this->createHostId());
        $product   = new Product();
        $product->setId($productId);

        return $product;
    }

    /**
     * @param TranslatableAttribute $attribute
     *
     * @return TranslatableAttributeI18n
     * @throws JsonException
     * @throws TranslatableAttributeException
     */
    protected function addTranslatableAttributeI18n(TranslatableAttribute $attribute): TranslatableAttributeI18n
    {
        $attributeI18n = new TranslatableAttributeI18n();
        $attributeI18n->setName('Foo');
        $attributeI18n->setValue('Bar');

        $attribute->addI18n($attributeI18n);

        return $attributeI18n;
    }

    /**
     * @param Product|Category $translatableModel
     * @param bool                            $setId
     *
     * @return TranslatableAttribute
     * @throws \Exception
     */
    protected function addTranslatableAttribute(
        TranslatableAttributesInterface $translatableModel,
        bool                            $setId = true
    ): TranslatableAttribute {
        $attributeId = new Identity($this->createEndpointId(), $this->createHostId());
        $attribute   = new ProductAttribute();
        if ($setId) {
            $attribute->setId($attributeId);
        }


        $translatableModel->addAttribute($attribute);

        return $attribute;
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeAppendProductAttrIdToAttributesNestedObjects(): void
    {
        $product   = $this->createProduct();
        $attribute = $this->addTranslatableAttribute($product);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $response = new ResponsePacket();
        $response->setResult([$product]);

        $serializedResponse = $serializer->build()->serialize($response, 'json');

        /** @var ResponsePacket $responseObj */
        $responseObj = \json_decode($serializedResponse, false, 512, \JSON_THROW_ON_ERROR);
        /** @var Product[] $resultArr */
        $resultArr       = $responseObj->getResult();
        $responseProduct = $resultArr[0];
        $i18n            = $responseProduct->getAttributes()[0]->getI18ns()[0];

        if (!\property_exists($i18n, 'productAttrId')) { //@phpstan-ignore-line
            $this->fail('property \'productAttrId\' does not exist.');
        }

        $attributeId = $attribute->getId();

        /** @noinspection PhpUndefinedFieldInspection */
        $this->assertSame([$attributeId->getEndpoint(), $attributeId->getHost()], $i18n->productAttrId);
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductAttrIdHasDefaultValuesWhenIdIsNotSet(): void
    {
        $product   = $this->createProduct();
        $attribute = $this->addTranslatableAttribute($product, false);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        /** @var Product $productObj */
        $productObj = \json_decode($serializedProduct, false, 512, \JSON_THROW_ON_ERROR);

        $i18n = $productObj->getAttributes()[0]->getI18ns()[0];

        if (!\property_exists($i18n, 'productAttrId')) { //@phpstan-ignore-line
            $this->fail('property \'productAttrId\' does not exist.');
        }

        $emptyIdentity = new Identity();

        /** @noinspection PhpUndefinedFieldInspection */
        $this->assertSame([$emptyIdentity->getEndpoint(), $emptyIdentity->getHost()], $i18n->productAttrId);
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductI18nArrayIsEmpty(): void
    {
        $product = $this->createProduct();
        $this->addTranslatableAttribute($product, false);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        /** @var Product $productObj */
        $productObj = \json_decode($serializedProduct, false, 512, \JSON_THROW_ON_ERROR);

        $this->assertEmpty($productObj->getAttributes()[0]->getI18ns());
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductAttrIdAttributeAppendsOnlyToProduct(): void
    {
        $categoryId = new Identity($this->createEndpointId(), $this->createHostId());
        $category   = new Category();
        $category->setId($categoryId);

        $attribute = $this->addTranslatableAttribute($category, false);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($category, 'json');

        /** @var Category $categoryObj */
        $categoryObj = \json_decode($serializedProduct, false, 512, \JSON_THROW_ON_ERROR);

        $i18n = $categoryObj->getAttributes()[0]->getI18ns()[0];

        if (!\property_exists($i18n, 'productAttrId')) { //@phpstan-ignore-line
            $this->fail('$i18n should have property "productAttrId".');
        }
    }
}
