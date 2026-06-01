<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MariaDBPlatform;
use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Types\Exception\InvalidType;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class Uuid4TypeTest extends TestCase
{
    /**
     * @param string $givenValue
     * @param string $convertedValue
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws InvalidType
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('convertToDatabaseValueProvider')]
    public function testConvertToDatabaseValue(string $givenValue, string $convertedValue): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $type     = new Uuid4Type();
        $this->assertEquals($convertedValue, $type->convertToDatabaseValue($givenValue, $platform));
    }

    /**
     * @param string $givenValue
     * @param string $convertedValue
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('convertToPhpValueProvider')]
    public function testConvertToPHPValue(string $givenValue, string $convertedValue): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $type     = new Uuid4Type();
        $this->assertEquals($convertedValue, $type->convertToPHPValue($givenValue, $platform));
    }

    /**
     * @param AbstractPlatform $platform
     * @param string           $columnExpresion
     * @param string           $expectedExpression
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('convertToPHPValueSQLProvider')]
    public function testConvertToPHPValueSQL(
        AbstractPlatform $platform,
        string           $columnExpresion,
        string           $expectedExpression
    ): void {
        $this->assertEquals($expectedExpression, (new Uuid4Type())->convertToPHPValueSQL($columnExpresion, $platform));
    }

    /**
     * @return array<int, array<int, string>>
     * @throws \RuntimeException
     */
    public static function convertToDatabaseValueProvider(): array
    {
        $firstDecode  = \base64_decode('M23C0lBHSZWTeGvlPztRvg==', true);
        $secondDecode = \base64_decode('ZRBfJrVcTwSX0ErDbtYltw==', true);
        if ($firstDecode === false || $secondDecode === false) {
            throw new \RuntimeException('decode must not be false.');
        }

        return [
            ['336dc2d2-5047-4995-9378-6be53f3b51be', $firstDecode],
            ['65105f26b55c4f0497d04ac36ed625b7', $secondDecode],
        ];
    }

    /**
     * @return array<int, array<int, string>>
     * @throws \RuntimeException
     */
    public static function convertToPhpValueProvider(): array
    {
        $decode = \base64_decode('M23C0lBHSZWTeGvlPztRvg==', true);
        if ($decode === false) {
            throw new \RuntimeException('decode must not be false.');
        }

        return [
            [$decode, '336dc2d25047499593786be53f3b51be'],
            ['0e68bdd4f95b4fa09dee433b4f9f40e1', '0e68bdd4f95b4fa09dee433b4f9f40e1'],
            ['0E68BDD4F95B4FA09DEE433B4F9F40E1', '0E68BDD4F95B4FA09DEE433B4F9F40E1'],
            ['336dc2d2-5047-4995-9378-6be53f3b51be', '336dc2d2-5047-4995-9378-6be53f3b51be'],
        ];
    }

    /**
     * @return array<int, array{0: AbstractPlatform, 1: string, 2: string}>
     */
    public static function convertToPHPValueSQLProvider(): array
    {
        return [
            [new MySQLPlatform(), 'foo', 'LOWER(HEX(foo))'],
            [new MariaDBPlatform(), 'bar', 'LOWER(HEX(bar))'],
            [new MySQLPlatform(), 'foobar', 'LOWER(HEX(foobar))'],
            [new MySQLPlatform(), 'yeeha', 'LOWER(HEX(yeeha))'],
            [new SQLitePlatform(), 'rofl', 'LOWER(HEX(rofl))'],
            [new SQLitePlatform(), 'abcde', 'LOWER(HEX(abcde))'],
        ];
    }
}
