<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Logger\Processor;

use Jtl\Connector\Core\Logger\Processor\RequestProcessor;
use Jtl\Connector\Core\Test\TestCase;
use Monolog\Level;
use Monolog\LogRecord;
use PHPUnit\Framework\Attributes\DataProvider;

class RequestProcessorTest extends TestCase
{
    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function uriProvider(): array
    {
        return [
            'plain jtlauth'           => ['/index.php?jtlauth=abc123', '/index.php?jtlauth=***'],
            // decoded value is "abc123", a str_replace of the decoded value against the raw URI would miss this
            'percent-encoded value'   => ['/index.php?jtlauth=%61bc123', '/index.php?jtlauth=***'],
            // PHP decodes the parameter name too, so %6atlauth is read as jtlauth and must be redacted as well
            'percent-encoded name'    => ['/x?%6atlauth=secret', '/x?%6atlauth=***'],
            'partly-encoded name'     => ['/x?j%74lauth=secret', '/x?j%74lauth=***'],
            'uppercase name'          => ['/x?JTLAUTH=secret', '/x?JTLAUTH=***'],
            // PHP mangles the parameter name like it does for $_GET, so these all resolve to jtlauth and must be hit
            'leading-space name'      => ['/x?%20jtlauth=secret', '/x?%20jtlauth=***'],
            'plus-as-space name'      => ['/x?+jtlauth=secret', '/x?+jtlauth=***'],
            'nul-truncated name'      => ['/x?jtlauth%00ignored=secret', '/x?jtlauth%00ignored=***'],
            'jtlauth among others'    => ['/x?foo=1&jtlauth=abc&bar=2', '/x?foo=1&jtlauth=***&bar=2'],
            'repeated jtlauth'        => ['/x?jtlauth=a&jtlauth=b', '/x?jtlauth=***&jtlauth=***'],
            'value contains equals'   => ['/x?jtlauth=a=b=c', '/x?jtlauth=***'],
            // "#" is an ordinary query character ($_GET keeps it), so the jtlauth value (incl. a trailing "#frag") goes
            'hash is part of value'   => ['/x?jtlauth=abc#frag', '/x?jtlauth=***'],
            // a jtlauth after a "#" is still a real $_GET parameter and must be redacted, not left in the "fragment"
            'jtlauth after a hash'    => ['/sync?jtlauth=abc#&jtlauth=abc', '/sync?jtlauth=***&jtlauth=***'],
            // a "#" inside a non-jtlauth value is preserved: nothing is redacted, so the raw URI is kept verbatim
            'hash in other value'     => ['/x?foo=bar#section', '/x?foo=bar#section'],
            'similar name untouched'  => ['/x?myjtlauth=a&jtlauthx=b', '/x?myjtlauth=a&jtlauthx=b'],
            // under the default separator ";" is an ordinary value character, so another value keeps it untouched
            'semicolon in value kept' => ['/x?foo=a;b&jtlauth=secret', '/x?foo=a;b&jtlauth=***'],
            'no jtlauth'              => ['/index.php?foo=bar', '/index.php?foo=bar'],
            'no query'                => ['/index.php', '/index.php'],
            'empty uri'               => ['', ''],
        ];
    }

    /**
     * @param string $requestUri
     * @param string $expectedUri
     *
     * @return void
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('uriProvider')]
    public function testJtlauthIsRedactedFromTheLoggedUri(string $requestUri, string $expectedUri): void
    {
        $serverBackup           = $_SERVER;
        $_SERVER['REQUEST_URI'] = $requestUri;
        try {
            $processor = new RequestProcessor();
            $record    = $processor(new LogRecord(new \DateTimeImmutable(), 'rpc', Level::Debug, 'message'));
            $this->assertSame($expectedUri, $record->extra['uri']);
        } finally {
            $_SERVER = $serverBackup;
        }
    }

    /**
     * When arg_separator.input is configured so ";" also separates parameters, PHP reads ?foo=1;jtlauth=<id> as a
     * jtlauth parameter, so the redaction has to split on ";" as well. The ini setting is PHP_INI_PERDIR and cannot be
     * changed at runtime, so the configured separators are supplied through the overridable seam the processor uses.
     *
     * @return void
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testJtlauthIsRedactedWhenSemicolonIsAConfiguredSeparator(): void
    {
        $serverBackup           = $_SERVER;
        $_SERVER['REQUEST_URI'] = '/x?foo=1;jtlauth=secret;bar=2';
        try {
            $processor = new class extends RequestProcessor {
                /**
                 * @return string
                 */
                protected function queryParameterSeparators(): string
                {
                    return '&;';
                }
            };
            $record    = $processor(new LogRecord(new \DateTimeImmutable(), 'rpc', Level::Debug, 'message'));
            $this->assertSame('/x?foo=1;jtlauth=***;bar=2', $record->extra['uri']);
        } finally {
            $_SERVER = $serverBackup;
        }
    }
}
