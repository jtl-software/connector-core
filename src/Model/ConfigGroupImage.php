<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class ConfigGroupImage extends AbstractImage
{
    /**
     * @return string
     */
    public function getRelationType(): string
    {
        return RelationType::CONFIG_GROUP;
    }
}
