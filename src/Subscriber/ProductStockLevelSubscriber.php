<?php
namespace Jtl\Connector\Core\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductStockLevel;

class ProductStockLevelSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Event::createHandleEventName(Controller::PRODUCT_STOCK_LEVEL, Action::PUSH, Event::BEFORE) => [
                ['prepareProductStockLevels', 10000]
            ]
        ];
    }

    public function prepareProductStockLevels(RequestEvent $event)
    {
        $request = $event->getRequest();
        if ($request->getController() === Controller::PRODUCT_STOCK_LEVEL && $request->getAction() === Action::PUSH) {
            $products = [];
            /** @var ProductStockLevel $stockLevel */
            foreach ($request->getParams() as $stockLevel) {
                $products[] = (new Product())
                    ->setId($stockLevel->getProductId())
                    ->setStockLevel($stockLevel->getStockLevel());
            }
            $request->setParams($products);
        }
    }
}
