<?php
namespace jtl\Connector\Event\ProductStockLevel;

use Symfony\Component\EventDispatcher\Event;
use jtl\Connector\Model\ProductStockLevel;


class ProductStockLevelAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.after.statistic';

	protected $productstocklevel;

    public function __construct(ProductStockLevel &$productstocklevel)
    {
		$this->productstocklevel = $productstocklevel;
    }

    public function getProductstocklevel()
    {
        return $this->productstocklevel;
	}
	
}