<?php

namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Features;

class FeaturesEvent extends Event
{
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
}
