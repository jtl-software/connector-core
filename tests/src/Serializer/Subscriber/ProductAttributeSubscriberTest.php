<?php
namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class ObjectTypesSubscriberTest
 * @package Jtl\Connector\Core\Serializer\Subscriber
 */
class ProductAttributeSubscriberTest extends TestCase
{

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
     * @param AbstractModel $translatableModel
     * @param bool $setId
     * @return TranslatableAttribute
     * @throws \Exception
     */
    protected function addTranslatableAttribute(
        AbstractModel $translatableModel,
        $setId = true
    ): TranslatableAttribute {
        $attributeId = new Identity($this->createEndpointId(), $this->createHostId());
        $attribute   = new TranslatableAttribute();
        if ($setId) {
            $attribute->setId($attributeId);
            ;
        }

        $translatableModel->addAttribute($attribute);

        return $attribute;
    }

    /**
     * @param TranslatableAttribute $attribute
     * @return TranslatableAttributeI18n
     */
    protected function addTranslatableAttributeI18n(TranslatableAttribute $attribute): TranslatableAttributeI18n
    {
        $attributeI18n = new TranslatableAttributeI18n();
        $attributeI18n->setName("Foo");
        $attributeI18n->setValue("Bar");

        $attribute->addI18n($attributeI18n);

        return $attributeI18n;
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeAppendProductAttrIdToAttributes()
    {
        $product = $this->createProduct();

        $attributes = [];

        $this->addTranslatableAttributeI18n($attributes[] = $this->addTranslatableAttribute($product));
        $this->addTranslatableAttributeI18n($attributes[] = $this->addTranslatableAttribute($product));

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        $productObj = \json_decode($serializedProduct);

        foreach ($productObj->attributes[0]->i18ns as $index => $i18n) {
            $attributeId = $attributes[$index]->getId();
            $this->assertSame([$attributeId->getEndpoint(), $attributeId->getHost()], $i18n->productAttrId);
        }
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeAppendProductAttrIdToAttributesNestedObjects()
    {
        $product   = $this->createProduct();
        $attribute = $this->addTranslatableAttribute($product);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $response = new ResponsePacket();
        $response->setResult([$product]);

        $serializedResponse = $serializer->build()->serialize($response, 'json');

        $responseObj = \json_decode($serializedResponse);

        $i18n = $responseObj->result[0]->attributes[0]->i18ns[0]->productAttrId;

        $attributeId = $attribute->getId();

        $this->assertSame([$attributeId->getEndpoint(), $attributeId->getHost()], $i18n);
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductAttrIdHasDefaultValuesWhenIdIsNotSet()
    {
        $product   = $this->createProduct();
        $attribute = $this->addTranslatableAttribute($product, false);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        $productObj = \json_decode($serializedProduct);

        $i18n = $productObj->attributes[0]->i18ns[0]->productAttrId;

        $emptyIdentity = new Identity();

        $this->assertSame([$emptyIdentity->getEndpoint(), $emptyIdentity->getHost()], $i18n);
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductI18nArrayIsEmpty()
    {
        $product = $this->createProduct();
        $this->addTranslatableAttribute($product, false);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($product, 'json');

        $productObj = \json_decode($serializedProduct);

        $this->assertEmpty($productObj->attributes[0]->i18ns);
    }

    /**
     * @throws \Exception
     */
    public function testOnPostSerializeProductAttrIdAttributeAppendsOnlyToProduct()
    {
        $categoryId = new Identity($this->createEndpointId(), $this->createHostId());
        $category   = new Category();
        $category->setId($categoryId);

        $attribute = $this->addTranslatableAttribute($category, false);
        $this->addTranslatableAttributeI18n($attribute);

        $serializer = SerializerBuilder::create();

        $serializedProduct = $serializer->build()->serialize($category, 'json');

        $categoryObj = \json_decode($serializedProduct);

        $i18n = $categoryObj->attributes[0]->i18ns[0];

        $this->assertObjectNotHasAttribute('productAttrId', $i18n);
    }
}
