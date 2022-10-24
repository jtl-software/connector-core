<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class RequestParamsTransformSubscriber
 * @package Jtl\Connector\Core\Subscriber
 */
class RequestParamsTransformSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createRpcEventName(Event::BEFORE) => [
                [
                    'transformRequestParams',
                    10000,
                ],
            ],
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
                case Controller::PRODUCT:
                    $data = $this->transformProductData($data);
                    break;
                case Controller::PRODUCT_PRICE:
                    $data = $this->transformProductPriceData($data);
                    break;
                case Controller::PRODUCT_STOCK_LEVEL:
                    $data = $this->transformProductStockLevelData($data);
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

            if (isset($product['prices']) && \is_array($product['prices'])) {
                foreach ($products[$i]['prices'] as $j => $productPrice) {
                    $products[$i]['prices'][$j] = self::sortProductPriceItems($productPrice);
                }
            }
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
                    'id'         => $productPrice['productId'] ?? null,
                    'sku'        => $productPrice['sku'] ?? '',
                    'vat'        => $productPrice['vat'] ?? 0.,
                    'taxClassId' => $productPrice['taxClassId'] ?? null,
                ];

                $products[$hostId] = $product;
            }

            $products[$hostId]['prices'][] = self::sortProductPriceItems($productPrice);
        }

        return \array_values($products);
    }

    /**
     * @param array $productStockLevel
     * @return array
     */
    public function transformProductStockLevelData(array $productStockLevel): array
    {
        $products = [];
        foreach ($productStockLevel as $stockLevel) {
            $product    = [
                'id'         => $stockLevel['productId'] ?? null,
                'sku'        => $stockLevel['sku'] ?? '',
                'stockLevel' => $stockLevel['stockLevel'] ?? 0.,
            ];
            $products[] = $product;
        }

        return $products;
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

    /**
     * @param array $productPrice
     * @return array
     */
    protected static function sortProductPriceItems(array $productPrice): array
    {
        if (isset($productPrice['items'])) {
            \usort($productPrice['items'], function ($a, $b) {
                return ($a['quantity'] ?? 0) - ($b['quantity'] ?? 0);
            });
        }

        return $productPrice;
    }
}
