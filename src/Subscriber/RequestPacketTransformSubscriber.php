<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ProductTransformSubscriber
 * @package Jtl\Connector\Core\Subscriber
 */
class RequestPacketTransformSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createRpcEventName(Event::BEFORE) => [
                ['transformRequestParams', 10000]
            ]
        ];
    }

    /**
     * @param RpcEvent $event
     */
    public function transformRequestParams(RpcEvent $event)
    {
        if ($event->getAction() === Action::PUSH) {
            $data = $event->getData();

            switch ($event->getController()) {
                case Controller::PRODUCT_PRICE:
                    $data = $this->transformProductPriceData($data);
                    break;
                case Controller::PRODUCT_STOCK_LEVEL:
                    $data = $this->transformStockLevelData($data);
                    break;
                case Controller::PRODUCT:
                    $data = $this->transformProductData($data);
                    break;
            }

            $event->setData($data);
        }
    }

    /**
     * @param array $products
     * @return array
     */
    public function transformProductData(array $products): array
    {
        foreach ($products as $i => $product) {
            if (isset($product['stockLevel']['stockLevel'])) {
                $products[$i]['stockLevel'] = $product['stockLevel']['stockLevel'];
            }
        }
        return $products;
    }

    /**
     * @param array $productStockLevel
     * @return array
     */
    public function transformStockLevelData(array $productStockLevel): array
    {
        $products = [];
        foreach ($productStockLevel as $stockLevel) {
            $product = [
                'id' => $stockLevel['productId'],
                'sku' => $stockLevel['sku'],
                'stockLevel' => $stockLevel['stockLevel']
            ];
            $products[] = $product;
        }
        return $products;
    }

    /**
     * @param array $productPrices
     * @return array
     */
    public function transformProductPriceData(array $productPrices): array
    {
        $products = [];

        foreach ($productPrices as $productPrice) {
            $hostId = self::extractHostId($productPrice['productId']);

            if (!isset($products[$hostId])) {
                $product = [
                    'id' => $productPrice['productId'],
                    'sku' => $productPrice['sku'] ?? '',
                    'vat' => $productPrice['vat'] ?? 0.,
                    'taxClassId' => $productPrice['taxClassId'] ?? null,
                ];

                $products[$hostId] = $product;
            }

            if (isset($productPrice['items'])) {
                usort($productPrice['items'], function ($a, $b) {
                    return $a['quantity'] - $b['quantity'];
                });
            }

            $products[$hostId]['prices'][] = $productPrice;
        }

        return array_values($products);
    }

    /**
     * @param array $identity
     * @return int
     */
    protected static function extractHostId(array $identity): int
    {
        list($endpointId, $hostId) = $identity;
        return $hostId;
    }
}
