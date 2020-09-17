<?php

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\CategoryImage;
use Jtl\Connector\Core\Model\ManufacturerImage;
use Jtl\Connector\Core\Model\ProductImage;
use Jtl\Connector\Core\Model\ProductVariationValueImage;
use Jtl\Connector\Core\Test\TestCase;


class AbstractImageTest extends TestCase
{
    /**
     * @dataProvider relationTypeProvider
     *
     * @param AbstractImage $image
     * @param string $relationType
     * @throws \ReflectionException
     */
    public function testGetRelationType(AbstractImage $image, string $relationType)
    {
        $this->assertEquals($relationType, $image->getRelationType());
    }

    /**
     * @return array[]
     */
    public function relationTypeProvider(): array
    {
        return [
            [new CategoryImage(), 'category'],
            [new ProductImage(), 'product'],
            [new ProductVariationValueImage(), 'productVariationValue'],
            [new ManufacturerImage(), 'manufacturer'],
        ];
    }
}