<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\CategoryImage;
use Jtl\Connector\Core\Model\ManufacturerImage;
use Jtl\Connector\Core\Model\ProductImage;
use Jtl\Connector\Core\Model\ProductVariationValueImage;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use RuntimeException;

class AbstractImageTest extends TestCase
{
    /**
     * @param AbstractImage $image
     * @param string        $relationType
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relationTypeProvider')]
    public function testGetRelationType(AbstractImage $image, string $relationType): void
    {
        $this->assertEquals($relationType, $image->getRelationType());
    }

    /**
     * @return array{
     *          0: array{0: CategoryImage},
     *          1: array{0: ProductImage},
     *          2: array{0: ProductVariationValueImage},
     *          3: array{0: ManufacturerImage}
     *     }
     */
    public static function relationTypeProvider(): array
    {
        return [
            [new CategoryImage(), 'category'],
            [new ProductImage(), 'product'],
            [new ProductVariationValueImage(), 'productVariationValue'],
            [new ManufacturerImage(), 'manufacturer']
        ];
    }

    /**
     * @param string $fileName
     * @param string $expectedExtension
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('extensionProvider')]
    public function testGetExtension(string $fileName, string $expectedExtension): void
    {
        $image = $this->getMockForAbstractClass(AbstractImage::class);
        $image->setFilename($fileName);
        $this->assertEquals($expectedExtension, $image->getExtension());
    }

    /**
     * @return array<int, array{0: string, 1: string}>
     */
    public static function extensionProvider(): array
    {
        return [
            ['file.name', 'name'],
            ['some.file.name', 'name'],
            ['filename', ''],
            ['', '']
        ];
    }
}
