<?php

namespace Jtl\Connector\Core\Test\Authentication;

use Jtl\Connector\Core\Authentication\TokenValidator;
use Jtl\Connector\Core\Exception\TokenValidatorException;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenValidationTest
 * @package Jtl\Connector\Core\Authentication
 */
class TokenValidationTest extends TestCase
{
    /**
     * @dataProvider tokenDataProvider
     *
     * @param string $connectorToken
     * @param string $token
     * @param bool $result
     * @throws TokenValidatorException
     */
    public function testValidateToken(string $connectorToken, string $token, bool $result)
    {
        $validator = new TokenValidator($connectorToken);
        $this->assertEquals($result, $validator->validate($token));
    }

    /**
     *
     */
    public function testInstantiateWithEmptyToken()
    {
        $this->expectException(TokenValidatorException::class);
        $this->expectExceptionCode(TokenValidatorException::EMPTY_TOKEN);
        new TokenValidator('');
    }

    /**
     * @return array
     */
    public function tokenDataProvider(): array
    {
        return [
            [
                'foo',
                'foo',
                true,
            ],
            [
                'foo',
                'bar',
                false,
            ],
            [
                'man',
                'dan',
                false,
            ],
            [
                ' ',
                ' ',
                true,
            ],
            [
                'waaahu',
                'wuuuhaaa',
                false,
            ],
            [
                '1',
                '1',
                true,
            ],
            [
                '0',
                '1',
                false,
            ],
        ];
    }
}
