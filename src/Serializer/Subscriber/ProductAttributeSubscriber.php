<?php

namespace Jtl\Connector\Core\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;

class ProductAttributeSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<int, array<string, string>>
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event'  => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json',
            ],
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        if ($event->getObject() instanceof TranslatableAttributeI18n) {
            $product = null;
            /** @var \SplObjectStorage $visitingSet */
            $visitingSet = $event->getContext()->getVisitingSet();
            foreach ($visitingSet as $index => $element) {
                if ($element instanceof Product) {
                    $product = $element;
                    break;
                }
            }

            if (!\is_null($product)) {
                $visitingSet->offsetSet($product);
                $visitingSet->next();
                /** @var TranslatableAttribute $attribute */
                $attribute     = $visitingSet->current();
                $productAttrId = $attribute->getId()->toArray();
                $event->getVisitor()->visitProperty(
                    new StaticPropertyMetadata('', 'productAttrId', $productAttrId),
                    $productAttrId
                );
            }
        }
    }
}
