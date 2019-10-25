<?php
namespace Jtl\Connector\Core\Event\ProductPrice;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\ProductPrice;


class ProductPriceAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'productprice.after.delete';

	protected $productPrice;

    public function __construct(ProductPrice &$productPrice)
    {
		$this->productPrice = $productPrice;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
	}
	
}
