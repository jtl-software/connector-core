<?php

namespace Jtl\Connector\Core\Test\Model;

use Faker\Factory;
use Jtl\Connector\Core\Exception\DefinitionException;
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
     * @throws DefinitionException
     */
    public function testGetRelationType(AbstractImage $image, string $relationType)
    {
        $this->assertEquals($relationType, $image->getRelationType());
    }

    public function testGetExtension()
    {
        $faker = Factory::create();
        $expectedExtension = $faker->fileExtension;
        $fileName = sprintf('%s.%s', $faker->filePath(), $expectedExtension);
        $image = $this->getMockForAbstractClass(AbstractImage::class);
        $image->setFilename($fileName);
        $this->assertEquals($expectedExtension, $image->getExtension());
    }

    public function testGetEmptyExtension()
    {
        $image = $this->getMockForAbstractClass(AbstractImage::class);
        $this->assertEquals('', $image->getExtension());
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
