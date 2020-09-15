<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\Model;

class SpecificValueImage extends AbstractImage
{
    /**
     * @return string
     */
    protected function getRelatedModel(): string
    {
        return Model::SPECIFIC_VALUE;
    }
}
