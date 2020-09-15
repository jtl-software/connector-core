<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\Model;

class SpecificImage extends AbstractImage
{
    /**
     * @return string
     */
    protected function getRelatedModel(): string
    {
        return Model::SPECIFIC;
    }
}
