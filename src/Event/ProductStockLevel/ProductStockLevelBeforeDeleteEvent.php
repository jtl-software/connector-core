<?php
namespace Jtl\Connector\Core\Event\ProductStockLevel;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\ProductStockLevel;

class ProductStockLevelBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.before.delete';

    protected $productStockLevel;

    public function __construct(ProductStockLevel &$productStockLevel)
    {
        $this->productStockLevel = $productStockLevel;
    }

    public function getProductStockLevel()
    {
        return $this->productStockLevel;
    }
}
