<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Rpc\RequestPacket;
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
            /** @var RequestPacket $packet */
            $packet = $event->getPacket();
            $params = $packet->getParams();

            switch ($event->getController()) {
                case Controller::PRODUCT_PRICE:
                    $params = $this->transformProductPriceData($params);
                    break;
                case Controller::PRODUCT_STOCK_LEVEL:
                    $params = $this->transformStockLevelData($params);
                    break;
                case Controller::PRODUCT:
                    $params = $this->transformProductData($params);
                    break;
            }

            $packet->setParams($params);
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
                    'prices' => [],
                    'id' => $productPrice['productId'],
                    'sku' => $productPrice['sku'] ?? '',
                    'vat' => $productPrice['vat'] ?? 0.,
                    'taxClassId' => $productPrice['taxClassId'] ?? null,
                ];

                $products[$hostId] = $product;
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
