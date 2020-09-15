<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\Model;

class ConfigGroupImage extends AbstractImage
{
    /**
     * @return string
     */
    protected function getRelatedModel(): string
    {
        return Model::CONFIG_GROUP_IMAGE;
    }
}
