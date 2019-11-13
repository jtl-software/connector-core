<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class CategoryImage extends AbstractImage
{
    public function getRelationType(): string
    {
        return RelationType::CATEGORY;
    }
}