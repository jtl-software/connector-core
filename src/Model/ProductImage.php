<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class ProductImage extends Image
{
    /**
     * CategoryImage constructor.
     */
    public function __construct()
    {
        $this->relationType = RelationType::PRODUCT;
    }

    public function setRelationType(string $relationType): Image
    {
        return $this;
    }
}