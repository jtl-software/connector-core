<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

class ControllerTest extends TestCase
{
    /**
     * @param string $controllerName
     * @param bool   $shouldBeController
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('isTypeDataProvider')]
    public function testIsType(string $controllerName, bool $shouldBeController): void
    {
        $isType = Controller::isController($controllerName);
        $this->assertSame($shouldBeController, $isType);
    }

    /**
     * @return array<int, array{0: string, 1: bool}>
     */
    public static function isTypeDataProvider(): array
    {
        /** @var array<int, array{0: string, 1: bool}> $testCases */
        $testCases   = self::getCorrectConstantsTestCases(Controller::class);
        $testCases[] = [
            'false',
            false,
        ];
        $testCases[] = ['', false,];
        $testCases[] = ['statuschange', false,];

        return $testCases;
    }
}
