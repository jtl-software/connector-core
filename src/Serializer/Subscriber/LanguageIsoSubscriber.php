<?php
namespace Jtl\Connector\Core\Serializer\Subscriber;

use Gmo\Iso639\Languages;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Model\AbstractI18n;

class LanguageIsoSubscriber implements EventSubscriberInterface
{
    protected $languages;

    /**
     * LanguageIsoSubscriber constructor.
     */
    public function __construct()
    {
        $this->languages = new Languages();
    }

    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json'
            ],
            [
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeSerialize',
                'format' => 'json'
            ]
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $model = $event->getObject();
        if($model instanceof AbstractI18n) {
            $language = $this->languages->findByCode1($model->getLanguageIso());
            $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'languageISO', $language->code2b()), $language->code2b());
        }
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        if(is_array($data) && isset($data['languageISO']) && !isset($data['languageIso'])) {
            $language = $this->languages->findByCode2b($data['languageISO']);
            $data['languageIso'] = $language->code1();
        }
    }
}