<?php
namespace Jtl\Connector\Core\Event\CrossSelling;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\CrossSelling;


class CrossSellingAfterPullEvent extends Event
{
    const EVENT_NAME = 'crossselling.after.pull';

	protected $crossSelling;

    public function __construct(CrossSelling &$crossSelling)
    {
		$this->crossSelling = $crossSelling;
    }

    public function getCrossSelling()
    {
        return $this->crossSelling;
	}
}
