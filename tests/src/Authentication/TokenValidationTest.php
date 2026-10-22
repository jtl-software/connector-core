<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Authentication;

use Jtl\Connector\Core\Authentication\TokenValidator;
use Jtl\Connector\Core\Exception\TokenValidatorException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenValidationTest
 *
 * @package Jtl\Connector\Core\Authentication
 */
class TokenValidationTest extends TestCase
{
    /**
     * @param string $connectorToken
     * @param string $token
     * @param bool   $result
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws TokenValidatorException
     */
    #[DataProvider('tokenDataProvider')]
    public function testValidateToken(string $connectorToken, string $token, bool $result): void
    {
        $validator = new TokenValidator($connectorToken);
        $this->assertEquals($result, $validator->validate($token));
    }

    /**
     * @return void
     */
    public function testInstantiateWithEmptyToken(): void
    {
        $this->expectException(TokenValidatorException::class);
        $this->expectExceptionCode(TokenValidatorException::EMPTY_TOKEN);
        new TokenValidator('');
    }

    /**
     * @return array<int, array{0: string, 1: string, 2: bool}>
     */
    public static function tokenDataProvider(): array
    {
        return [
            ['foo', 'foo', true],
            ['foo', 'bar', false],
            ['man', 'dan', false],
            [' ', ' ', true],
            ['waaahu', 'wuuuhaaa', false],
            ['1', '1', true],
            ['0', '1', false],
        ];
    }
}
