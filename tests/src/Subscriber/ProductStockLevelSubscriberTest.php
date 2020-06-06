<?php

namespace Jtl\Connector\Core\Test\Subscriber;

use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductStockLevel;
use Jtl\Connector\Core\Subscriber\ProductStockLevelSubscriber;
use PHPUnit\Framework\TestCase;

class ProductStockLevelSubscriberTest extends TestCase
{
    public function testPrepareProductStockLevels()
    {
        $hostId = 0;
        $stockLevels = [];
        $max = mt_rand(1, 10);
        for ($i = 0; $i < $max; $i++) {
            $hostId += mt_rand(1, 20);
            $stockLevels[] = (new ProductStockLevel())->setProductId(new Identity('', $hostId))->setStockLevel(mt_rand(0, 42));
        }
        $subscriber = new ProductStockLevelSubscriber();
        $request = (new Request('ProductStockLevel', 'push', $stockLevels));
        $subscriber->prepareProductStockLevels(new RequestEvent($request));
        foreach ($request->getParams() as $i => $param) {
            $this->assertInstanceOf(Product::class, $param);
            $this->assertEquals($stockLevels[$i]->getProductId(), $param->getId());
            $this->assertEquals($stockLevels[$i]->getStockLevel(), $param->getStockLevel());
        }
    }
}
