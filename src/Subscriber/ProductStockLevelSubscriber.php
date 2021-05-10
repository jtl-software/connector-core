<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductStockLevel;

/**
 * Class ProductStockLevelSubscriber
 * @package Jtl\Connector\Core\Subscriber
 */
class ProductStockLevelSubscriber extends ProductTransform
{
    /**
     * @return \array[][]
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createHandleEventName(Controller::PRODUCT_STOCK_LEVEL, Action::PUSH, Event::BEFORE) => [
                ['swapRequestParams', 10000]
            ]
        ];
    }

    /**
     * @param AbstractDataModel ...$models
     * @return array
     */
    protected function transformToProductModels(AbstractDataModel ...$models): array
    {
        $products = [];
        /** @var ProductStockLevel $stockLevel */
        foreach ($models as $stockLevel) {
            $product = (new Product())
                ->setId($stockLevel->getProductId())
                ->setStockLevel($stockLevel->getStockLevel());

            $this->assignAdditionalProperties($product);
            $products[] = $product;
        }
        return $products;
    }

    /**
     * @return string[]
     */
    protected function getAdditionalPropertiesToAssign(): array
    {
        return [
            'sku'
        ];
    }
}
