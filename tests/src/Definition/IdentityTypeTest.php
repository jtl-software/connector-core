<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class IdentityTypeTest
 *
 * @package Jtl\Connector\Core\Test\Definition
 */
class IdentityTypeTest extends TestCase
{
    /**
     * @param int  $type
     * @param bool $shouldBeIdentityType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('isTypeDataProvider')]
    public function testIsType(int $type, bool $shouldBeIdentityType): void
    {
        $isType = IdentityType::isType($type);
        $this->assertSame($shouldBeIdentityType, $isType);
    }

    /**
     * @return array<int, array{0: int, 1: bool}>
     */
    public static function isTypeDataProvider(): array
    {
        /** @var array<int, array{0: int, 1: bool}> $testCases */
        $testCases   = self::getCorrectConstantsTestCases(IdentityType::class);
        $testCases[] = [0, false];
        $testCases[] = [-100, false];
        $testCases[] = [68, true];

        return $testCases;
    }
}
