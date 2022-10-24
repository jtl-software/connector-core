<?php

namespace Jtl\Connector\Core\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Jtl\Connector\Core\Model\CrossSelling;

class CrossSellingSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<int, array<string, string>>
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event'  => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'format' => 'json',
            ],
        ];
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $className = $event->getType()['name'] ?? '';
        if ($className === CrossSelling::class) {
            $data      = $event->getData();
            $productId = $data['productId'][1] ?? 0;
            if (isset($data['items']) && \is_array($data['items'])) {
                foreach ($data['items'] as $i => $item) {
                    if (!isset($data['items'][$i]['id'])) {
                        $crossSellingGroupId = $item['crossSellingGroupId'][1] ?? 0;
                        $itemId              = self::cantorPairingFunction($productId, $crossSellingGroupId);
                        if ($productId !== 0 && $crossSellingGroupId !== 0 && $itemId < \PHP_INT_MAX) {
                            $data['items'][$i]['id'] = [
                                '',
                                $itemId,
                            ];
                        }
                    }
                }

                $event->setData($data);
            }
        }
    }

    /**
     * @param integer $productId
     * @param integer $crossSellingGroupId
     * @return integer
     */
    protected static function cantorPairingFunction(int $productId, int $crossSellingGroupId): int
    {
        //Found at https://gist.github.com/hannesl/8031402
        return (int)(
            ($productId + $crossSellingGroupId) * ($productId + $crossSellingGroupId + 1)
        ) / 2 + $crossSellingGroupId;
    }
}
