<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class ProductVariationValueImage extends AbstractImage
{
    public function getRelationType(): string
    {
        return RelationType::PRODUCT_VARIATION_VALUE;
    }
}
