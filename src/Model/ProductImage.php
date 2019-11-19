<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class ProductImage extends AbstractImage
{
    /**
     * @return string
     */
    public function getRelationType(): string
    {
        return RelationType::PRODUCT;
    }
}