<?php
namespace Jtl\Connector\Core\Event\Product;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Product;

class ProductAfterPushEvent extends Event
{
    const EVENT_NAME = 'product.after.push';

    protected $product;

    public function __construct(Product &$product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return $this->product;
    }
}
