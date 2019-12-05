<?php
namespace Jtl\Connector\Core\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Exception\SerializerException;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Utilities\Str;

class ObjectTypesSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.pre_serialize',
                'method' => 'onPreSerialize',
                'format' => 'json'
            ],
            [
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json'
            ],
            [
                'event' => 'serializer.post_deserialize',
                'method' => 'onPostDeserialize',
                'format' => 'json'
            ]
        ];
    }

    /**
     * @param PreSerializeEvent $event
     */
    public function onPreSerialize(PreSerializeEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof Product) {
            $event->setType(Product::class);
        }
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof AbstractImage) {
            $id = clone $object->getId();
            $id->setEndpoint(sprintf('%s#=#%s', $object->getRelationType(), $id->getEndpoint()));
            $serializedId = $id->toArray();
            $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'id', $serializedId), $serializedId);
        } elseif ($object instanceof TranslatableAttributeI18n) {
            $visitingSet = $event->getContext()->getVisitingSet();
            $visitingSet->rewind();
            $root = $visitingSet->current();
            if ($root instanceof Product) {
                $visitingSet->next();
                /** @var TranslatableAttribute $attribute */
                $attribute = $visitingSet->current();
                $productAttrId = $attribute->getId()->toArray();
                $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'productAttrId', $productAttrId), $productAttrId);
            }
        }
    }

    /**
     * @param ObjectEvent $event
     * @throws SerializerException
     */
    public function onPostDeserialize(ObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof Ack) {
            $identities = $object->getIdentities();
            $imageIndex = Str::toCamelCase(Controller::IMAGE);
            if (isset($identities[$imageIndex])) {
                $resortedIdentities = [];
                /** @var Identity $identity */
                foreach ($identities[$imageIndex] as $identity) {
                    $splittedEndpoint = explode('#=#', $identity->getEndpoint());
                    if (count($splittedEndpoint) !== 2) {
                        throw SerializerException::wrongEndpointFormat($identity->getEndpoint());
                    }
                    $newIndex = Str::toCamelCase($splittedEndpoint[0]) . 'Image';
                    $identity->setEndpoint($splittedEndpoint[1]);
                    $resortedIdentities[$newIndex][] = $identity;
                }
                unset($identities[$imageIndex]);
                $identities += $resortedIdentities;
                $object->setIdentities($identities);
            }
        }
    }
}
