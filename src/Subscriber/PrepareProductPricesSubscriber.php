<?php
namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductPrice;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PrepareProductPricesSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createHandleEventName(Controller::PRODUCT_PRICE, Action::PUSH, Event::BEFORE) => [
                ['prepareProductPrices', 255]
            ]
        ];
    }

    /**
     * @param RequestEvent $event
     */
    public function prepareProductPrices(RequestEvent $event)
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
