<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\PaymentType;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class PaymentTypeTest
 *
 * @package Jtl\Connector\Core\Test\Definition
 */
class PaymentTypeTest extends TestCase
{
    /**
     * @param string $type
     * @param bool   $shouldBePaymentType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('isTypeDataProvider')]
    public function testIsType(string $type, bool $shouldBePaymentType): void
    {
        $isType = PaymentType::isType($type);
        $this->assertSame($shouldBePaymentType, $isType);
    }

    /**
     * @return array<int, array{0: string, 1: bool}>
     */
    public static function isTypeDataProvider(): array
    {
        /** @var array<int, array{0: string, 1: bool}> $testCases */
        $testCases   = self::getCorrectConstantsTestCases(PaymentType::class);
        $testCases[] = ['false', false];
        $testCases[] = ['', false];
        $testCases[] = ['pm worldpay', false];
        $testCases[] = ['PM_WORLDPAY', false];

        return $testCases;
    }
}
