<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Exception\SubscriberException;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductPrice;

class ProductPriceSubscriber extends ProductTransform
{
    /**
     * @return array
     * @throws \Exception
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createHandleEventName(Controller::PRODUCT_PRICE, Action::PUSH, Event::BEFORE) => [
                ['swapRequestParams', 10000]
            ]
        ];
    }

    /**
     * @param AbstractDataModel ...$models
     * @return array
     * @throws SubscriberException
     */
    protected function transformToProductModels(AbstractDataModel ...$models): array
    {
        $products = [];

        /** @var ProductPrice $productPrice */
        foreach ($models as $i => $productPrice) {
            if ($productPrice instanceof ProductPrice === false) {
                throw SubscriberException::invalidModelTypeInArray(
                    ProductPrice::class,
                    is_object($productPrice) ? get_class($productPrice) : 'variable'
                );
            }

            $hostId = $productPrice->getProductId()->getHost();

            if (!isset($products[$hostId])) {
                $product = (new Product())->setId($productPrice->getProductId());
                $this->assignAdditionalProperties($product);
                $products[$hostId] = $product;
            }

            $products[$hostId]->addPrice($productPrice);
        }

        return array_values($products);
    }

    /**
     * @return string[]
     */
    protected function getAdditionalPropertiesToAssign(): array
    {
        return [
            'sku',
            'vat',
            'taxClassId'
        ];
    }
}
