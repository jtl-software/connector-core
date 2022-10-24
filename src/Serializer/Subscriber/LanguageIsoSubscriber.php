<?php
namespace Jtl\Connector\Core\Serializer\Subscriber;

use WhiteCube\Lingua\Service as Lingua;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Model\AbstractI18n;

class LanguageIsoSubscriber implements EventSubscriberInterface
{
    /**
     * @var Lingua
     */
    protected $languages;

    /**
     * LanguageIsoSubscriber constructor.
     */
    public function __construct()
    {
        $this->languages = new Lingua();
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event'  => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json',
            ],
            [
                'event'  => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'format' => 'json',
            ],
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $model = $event->getObject();
        if ($model instanceof AbstractI18n) {
            $languageIso = $model->getLanguageIso();
            if (\strlen($languageIso) === 2) {
                $languageIso = $this->languages->fromISO_639_1($languageIso)->toISO_639_2b() ?? $languageIso;
            }

            $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'languageISO', $languageIso), $languageIso);
        }
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        if (\is_array($data) && isset($data['languageISO']) && !isset($data['languageIso'])) {
            $language            = $this->languages->fromISO_639_2b($data['languageISO']);
            $data['languageIso'] = $language->toISO_639_1() ?? $data['languageISO'];
            $event->setData($data);
        }
    }
}
