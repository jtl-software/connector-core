<?php

namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Jtl\Connector\Core\Model\CrossSelling;
use Jtl\Connector\Core\Serializer\Subscriber\CrossSellingSubscriber;
use PHPUnit\Framework\TestCase;

class CrossSellingSubscriberTest extends TestCase
{
    /**
     * @dataProvider crossSellingDataProvider
     *
     * @param array $data
     * @param int ...$expectedItemIds
     */
    public function testOnPreDeserialize(array $data, int ...$expectedItemIds)
    {
        $context    = $this->createMock(DeserializationContext::class);
        $type       = ['name' => CrossSelling::class, 'params' => []];
        $event      = new PreDeserializeEvent($context, $data, $type);
        $subscriber = new CrossSellingSubscriber();
        $subscriber->onPreDeserialize($event);
        foreach ($event->getData()['items'] as $i => $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertIsArray($item['id']);
            $this->assertArrayHasKey(0, $item['id']);
            $this->assertArrayHasKey(1, $item['id']);
            $this->assertEquals($expectedItemIds[$i] ?? null, $item['id'][1]);
        }
    }

    /**
     * @return array
     */
    public function crossSellingDataProvider(): array
    {
        $items = [
            [
                'crossSellingGroupId' => ["", 21],
                'productIds' => [["", 1]]
            ],
            [
                'crossSellingGroupId' => ["", 42],
                'productIds' => [["", 1]]
            ],
        ];

        return [
            [['id' => ["", 100], 'productId' => ["", 32], 'items' => $items], 1452, 2817]];
    }
}
