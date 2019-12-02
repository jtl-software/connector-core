<?php
namespace Jtl\Connector\Core\Event\Core;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\Features;
use Symfony\Contracts\EventDispatcher\Event;

class CoreAfterFeaturesEvent extends AbstractEvent
{
    const EVENT_NAME = 'core.connector.features';

    /**
     * @var Features
     */
    protected $features;

    /**
     * CoreConnectorAfterFeaturesEvent constructor.
     * @param Features $features
     */
    public function __construct(Features $features)
    {
        $this->features = $features;
    }

    /**
     * @return Features
     */
    public function getFeatures(): Features
    {
        return $this->features;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
