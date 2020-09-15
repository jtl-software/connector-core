<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\Model;

class CategoryImage extends AbstractImage
{
    /**
     * @return string
     */
    protected function getRelatedModel(): string
    {
        return Model::CATEGORY;
    }
}
