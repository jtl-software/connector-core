<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class ManufacturerImage extends AbstractImage
{
    public function getRelationType(): string
    {
        return RelationType::MANUFACTURER;
    }
}