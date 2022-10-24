<?php

namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

class ProductStockLevelSubscriberTest extends TestCase
{
    public function testOnPostSerialize()
    {
        $stocklevel = \mt_rand(0, 999);
        $product    = new Product();
        $product->setStockLevel($stocklevel);

        $serializer   = SerializerBuilder::create()->build();
        $productArray = $serializer->toArray($product);
        $this->assertEquals(['stockLevel' => $stocklevel], $productArray['stockLevel']);
    }
}
