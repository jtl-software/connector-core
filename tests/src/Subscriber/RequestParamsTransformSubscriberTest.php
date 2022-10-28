<?php

namespace Jtl\Connector\Core\Test\Subscriber;

use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Subscriber\RequestParamsTransformSubscriber;
use PHPUnit\Framework\TestCase;

class RequestParamsTransformSubscriberTest extends TestCase
{
    /**
     * @dataProvider transformRequestParamsProvider
     *
     * @param RpcEvent $event
     */
    public function testTransformRequestParams(RpcEvent $event)
    {
        $subscriber = $this->createPartialMock(
            RequestParamsTransformSubscriber::class,
            [
                'transformProductData',
                'transformProductPriceData',
                'transformProductStockLevelData'
            ]
        );

        $controller = $event->getController();
        $action     = $event->getAction();
        $data       = $event->getData();

        $subscriber
            ->expects($this->exactly($controller === 'Product' && $action === 'push' ? 1 : 0))
            ->method('transformProductData')
            ->with($data);

        $subscriber
            ->expects($this->exactly($controller === 'ProductPrice' && $action === 'push' ? 1 : 0))
            ->method('transformProductPriceData')
            ->with($data);

        $subscriber
            ->expects($this->exactly($controller === 'ProductStockLevel' && $action === 'push' ? 1 : 0))
            ->method('transformProductStockLevelData')
            ->with($data);

        $subscriber->transformRequestParams($event);
    }

    /**
     * @dataProvider transformProductProvider
     *
     * @param array $products
     * @param array $expectedResult
     */
    public function testTransformProductData(array $products, array $expectedResult)
    {
        $subscriber   = new RequestParamsTransformSubscriber();
        $actualResult = $subscriber->transformProductData($products);
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @dataProvider transformProductPriceProvider
     *
     * @param array $productPrices
     * @param array $expectedResult
     */
    public function testTransformProductPriceData(array $productPrices, array $expectedResult)
    {
        $subscriber   = new RequestParamsTransformSubscriber();
        $actualResult = $subscriber->transformProductPriceData($productPrices);
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @dataProvider transformProductStockLevelProvider
     *
     * @param array $productStock
     * @param array $expectedResult
     */
    public function testTransformStockLevelData(array $productStock, array $expectedResult)
    {
        $subscriber   = new RequestParamsTransformSubscriber();
        $actualResult = $subscriber->transformProductStockLevelData($productStock);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testGetSubscribedEvents()
    {
        $subscribedEvents = RequestParamsTransformSubscriber::getSubscribedEvents();
        $this->assertTrue(isset($subscribedEvents['rpc.before'][0][0]));
        $this->assertTrue(isset($subscribedEvents['rpc.before'][0][1]));
        $this->assertEquals('transformRequestParams', $subscribedEvents['rpc.before'][0][0]);
        $this->assertEquals(10000, $subscribedEvents['rpc.before'][0][1]);
    }

    /**
     * @return array
     */
    public function transformRequestParamsProvider(): array
    {
        return [
            [new RpcEvent(['foo', 'bar'], 'Product', 'push')],
            [new RpcEvent(['foo', 'bar'], 'Product', 'pull')],
            [new RpcEvent(['foo', 'bar'], 'ProductPrice', 'push')],
            [new RpcEvent(['foo', 'bar'], 'ProductPrice', 'statistic')],
            [new RpcEvent(['foo', 'bar'], 'ProductStockLevel', 'push')],
            [new RpcEvent(['foo', 'bar'], 'ProductStockLevel', 'yolo')],
            [new RpcEvent(['foo', 'bar'], 'Other', 'push')],
        ];
    }

    public function transformProductProvider(): array
    {
        return [
            [
                [
                    ['some' => 'thing'],
                    [
                        'foo'        => 'bar',
                        'stockLevel' => ['stockLevel' => 3.],
                    ],
                ],
                [
                    ['some' => 'thing'],
                    [
                        'foo'        => 'bar',
                        'stockLevel' => 3.,
                    ],
                ],
            ],
            [
                [['yo' => 'lo']],
                [['yo' => 'lo']],
            ],
            [
                [['stockLevel' => ['stockLevel' => 42.]]],
                [['stockLevel' => 42.]],
            ],
            [

                [
                    [
                        'prices' => [
                            [
                                'items' => [
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 10,
                                        'netPrice'       => 42.334,
                                    ],
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 0,
                                        'netPrice'       => 24.3697,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    [
                        'prices' => [
                            [
                                'items' => [
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 0,
                                        'netPrice'       => 24.3697,
                                    ],
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 10,
                                        'netPrice'       => 42.334,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],

            ],
        ];
    }

    public function transformProductPriceProvider(): array
    {
        return [
            [
                [
                    [
                        'customerId'      => [
                            '',
                            0,
                        ],
                        'items'           => [
                            [
                                'productPriceId' => [
                                    '',
                                    1,
                                ],
                                'quantity'       => 10,
                                'netPrice'       => 42.334,
                            ],
                            [
                                'productPriceId' => [
                                    '',
                                    1,
                                ],
                                'quantity'       => 0,
                                'netPrice'       => 24.3697,
                            ],
                        ],
                        'customerGroupId' => [
                            'cfbd5018d38d41d8adca10d94fc8bdd6',
                            1,
                        ],
                        'sku'             => 'foo',
                        'vat'             => 19.0,
                        'taxClassId'      => [
                            '',
                            42,
                        ],
                        'id'              => [
                            '',
                            1,
                        ],
                        'productId'       => [
                            '',
                            1,
                        ],
                    ],
                    [
                        'customerId'      => [
                            '',
                            0,
                        ],
                        'items'           => [
                            [
                                'productPriceId' => [
                                    '',
                                    2,
                                ],
                                'quantity'       => 0,
                                'netPrice'       => 24.3697,
                            ],
                        ],
                        'customerGroupId' => [
                            '2fa802a6db864bd49fe41f5f3ed6d8e7',
                            2,
                        ],
                        'sku'             => 'foo',
                        'vat'             => 19.0,
                        'taxClassId'      => [
                            '',
                            42,
                        ],
                        'id'              => [
                            '',
                            2,
                        ],
                        'productId'       => [
                            '',
                            1,
                        ],
                    ],
                    2 => [
                        'customerId'      => [
                            '',
                            0,
                        ],
                        'items'           => [
                            [
                                'productPriceId' => [
                                    '',
                                    0,
                                ],
                                'quantity'       => 0,
                                'netPrice'       => 24.3697,
                            ],
                        ],
                        'customerGroupId' => [
                            '',
                            0,
                        ],
                        'sku'             => 'foo',
                        'vat'             => 19.0,
                        'taxClassId'      => [
                            '',
                            42,
                        ],
                        'id'              => [
                            '',
                            0,
                        ],
                        'productId'       => [
                            '',
                            1,
                        ],
                    ],
                ],
                [

                    [
                        'id'         => [
                            '',
                            1,
                        ],
                        'sku'        => 'foo',
                        'vat'        => 19.,
                        'taxClassId' => [
                            '',
                            42,
                        ],
                        'prices'     => [
                            [
                                'customerId'      => [
                                    '',
                                    0,
                                ],
                                'items'           => [
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 0,
                                        'netPrice'       => 24.3697,
                                    ],
                                    [
                                        'productPriceId' => [
                                            '',
                                            1,
                                        ],
                                        'quantity'       => 10,
                                        'netPrice'       => 42.334,
                                    ],
                                ],
                                'customerGroupId' => [
                                    'cfbd5018d38d41d8adca10d94fc8bdd6',
                                    1,
                                ],
                                'sku'             => 'foo',
                                'vat'             => 19.0,
                                'taxClassId'      => [
                                    '',
                                    42,
                                ],
                                'id'              => [
                                    '',
                                    1,
                                ],
                                'productId'       => [
                                    '',
                                    1,
                                ],
                            ],
                            [
                                'customerId'      => [
                                    '',
                                    0,
                                ],
                                'items'           => [
                                    [
                                        'productPriceId' => [
                                            '',
                                            2,
                                        ],
                                        'quantity'       => 0,
                                        'netPrice'       => 24.3697,
                                    ],
                                ],
                                'customerGroupId' => [
                                    '2fa802a6db864bd49fe41f5f3ed6d8e7',
                                    2,
                                ],
                                'sku'             => 'foo',
                                'vat'             => 19.0,
                                'taxClassId'      => [
                                    '',
                                    42,
                                ],
                                'id'              => [
                                    '',
                                    2,
                                ],
                                'productId'       => [
                                    '',
                                    1,
                                ],
                            ],
                            2 => [
                                'customerId'      => [
                                    '',
                                    0,
                                ],
                                'items'           => [
                                    [
                                        'productPriceId' => [
                                            '',
                                            0,
                                        ],
                                        'quantity'       => 0,
                                        'netPrice'       => 24.3697,
                                    ],
                                ],
                                'customerGroupId' => [
                                    '',
                                    0,
                                ],
                                'sku'             => 'foo',
                                'vat'             => 19.0,
                                'taxClassId'      => [
                                    '',
                                    42,
                                ],
                                'id'              => [
                                    '',
                                    0,
                                ],
                                'productId'       => [
                                    '',
                                    1,
                                ],
                            ],
                        ],
                    ],

                ],
            ],
        ];
    }

    public function transformProductStockLevelProvider(): array
    {
        return [
            [
                [
                    [
                        'productId'  => [
                            '',
                            151,
                        ],
                        'stockLevel' => 37.0,
                        'sku'        => 'abcde',
                    ],
                    [
                        'productId'  => [
                            '',
                            159,
                        ],
                        'stockLevel' => 22.0,
                        'sku'        => '4u',
                    ],
                ],
                [
                    [
                        'id'         => [
                            '',
                            151,
                        ],
                        'stockLevel' => 37.0,
                        'sku'        => 'abcde',
                    ],
                    [
                        'id'         => [
                            '',
                            159,
                        ],
                        'stockLevel' => 22.0,
                        'sku'        => '4u',
                    ],
                ],
            ],
        ];
    }
}
