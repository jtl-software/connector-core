<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\ProductStockLevel;
use Symfony\Contracts\EventDispatcher\Event;

class ProductStockLevelEvent extends Event
{
    /**
     * @var ProductStockLevel
     */
    protected $stockLevel;

    /**
     * ProductStockLevelEvent constructor.
     * @param ProductStockLevel $stockLevel
     */
    public function __construct(ProductStockLevel $stockLevel)
    {
        $this->stockLevel = $stockLevel;
    }

    /**
     * @return ProductStockLevel
     */
    public function getStockLevel(): ProductStockLevel
    {
        return $this->stockLevel;
    }
}