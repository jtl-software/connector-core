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
    /**
     * @var Languages
     */
    protected $languages;

    /**
     * LanguageIsoSubscriber constructor.
     */
    public function __construct()
    {
        $this->languages = new Languages();
    }

    /**
     * @return array
     */
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
            $languageIso = $model->getLanguageIso();
            if(strlen($languageIso) === 2) {
                $languageIso = $this->languages->findByCode1($languageIso)->code2b() ?? $languageIso;
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
        if(is_array($data) && isset($data['languageISO']) && !isset($data['languageIso'])) {
            $language = $this->languages->findByCode2b($data['languageISO']);
            $data['languageIso'] = $language->code1() ?? $data['languageISO'];
            $event->setData($data);
        }
    }
}