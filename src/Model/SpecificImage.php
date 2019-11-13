<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class SpecificImage extends AbstractImage
{
    public function getRelationType(): string
    {
        return RelationType::SPECIFIC;
    }
}