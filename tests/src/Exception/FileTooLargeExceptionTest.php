<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Exception;

use Jtl\Connector\Core\Exception\FileTooLargeException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FileTooLargeExceptionTest extends TestCase
{
    /**
     * @param int    $size
     * @param string $expectedSizeInfo
     *
     * @return void
     */
    #[DataProvider('sizeInfoDataProvider')]
    public function testSizeInfoIsRoundedUpToOneDecimalMegabyte(int $size, string $expectedSizeInfo): void
    {
        $exception = new FileTooLargeException('284_Product.jpg', $size, 20_000_000);

        $this->assertSame($expectedSizeInfo, $exception->getSizeInfo());
        $this->assertSame(
            \sprintf('File "284_Product.jpg" is too large (%s)', $expectedSizeInfo),
            $exception->getMessage()
        );
    }

    /**
     * @return array<string, array{int, string}>
     */
    public static function sizeInfoDataProvider(): array
    {
        return [
            'whole megabytes'           => [25_000_000, '25 MB, max. 20 MB'],
            'fraction is rounded up'    => [23_410_000, '23.5 MB, max. 20 MB'],
            'one byte above the limit'  => [20_000_001, '20.1 MB, max. 20 MB'],
        ];
    }

    /**
     * @return void
     */
    public function testGettersReturnConstructorValues(): void
    {
        $exception = new FileTooLargeException('284_Product.jpg', 25_000_000, 20_000_000);

        $this->assertSame('284_Product.jpg', $exception->getEntryName());
        $this->assertSame(25_000_000, $exception->getSize());
        $this->assertSame(20_000_000, $exception->getMaxSize());
    }
}
