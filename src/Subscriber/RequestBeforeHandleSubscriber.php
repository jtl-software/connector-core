<?php
namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RequestBeforeHandleEvent;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductPrice;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RequestBeforeHandleSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::REQUEST_BEFORE_HANDLE_EVENT_NAME => [
                ['handleProductPriceRequest', 0]
            ]
        ];
    }

    /**
     * @param RequestBeforeHandleEvent $event
     */
    public function handleProductPriceRequest(RequestBeforeHandleEvent $event)
    {
        $request = $event->getRequest();
        if ($request->getController() === Controller::PRODUCT_PRICE && $request->getAction() === Action::PUSH) {
            $prices = $request->getParams();
            $resortedPrices = [];

            /** @var ProductPrice $price */
            foreach ($prices as $price) {

                $hostId = $price->getProductId()->getHost();

                if (!isset($resortedPrices[$hostId])) {
                    $resortedPrices[$hostId] = new Product();
                    $resortedPrices[$hostId]->setId($price->getProductId());
                }

                $resortedPrices[$hostId]->addPrice($price);
            }

            $request->setParams(array_values($resortedPrices));
        }
    }
}
