<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Processor;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class RequestProcessor implements ProcessorInterface
{
    /** @var array<string, string> */
    protected array $extraFields = [];

    /**
     * RequestProcessor constructor.
     */
    public function __construct()
    {
        /** @var array<string, string> $server */
        $server = $_SERVER;

        $this->extraFields = [
            'http_method' => $server['REQUEST_METHOD'] ?? '',
            'user_agent'  => $server['HTTP_USER_AGENT'] ?? '',
            'domain'      => $server['HTTP_HOST'] ?? $server['SERVER_NAME'] ?? ''
        ];

        $this->extraFields['uri'] = $this->redactJtlauth($server['REQUEST_URI'] ?? '');

        // post request size
        $input = \file_get_contents('php://input');
        if (false === $input) {
            $input = '';
        }
        $requestSize = (float)\strlen($input);
        $unit        = 'B';
        if ($requestSize > 1024 && $requestSize < 1024 * 1024) {
            $requestSize /= 1024;
            $unit         = 'KB';
        } elseif ($requestSize > 1024 * 1024) {
            $requestSize /= 1024 * 1024;
            $unit         = 'MB';
        }

        $this->extraFields['request_size'] = \sprintf('%.1F %s', $requestSize, $unit);

        $hostname = \gethostname();
        if ($hostname !== false) {
            $this->extraFields['hostname'] = $hostname;
        }
    }

    /**
     * Replaces the value of the jtlauth query parameter with ***. jtlauth is the session credential replayed by the
     * client, so it must not be logged. Each parameter is matched the way PHP itself populates $_GET: the query is
     * split on the configured argument separators (arg_separator.input, "&" by default) and each pair's name is run
     * through parse_str(), so url-encoding ("%6atlauth"), "+"/whitespace and NUL truncation ("jtlauth%00x") all still
     * resolve to jtlauth. The value is dropped regardless of its own encoding; the raw name and separators are kept.
     *
     * @param string $uri
     *
     * @return string
     */
    protected function redactJtlauth(string $uri): string
    {
        $queryStart = \strpos($uri, '?');
        if ($queryStart === false) {
            return $uri;
        }

        $prefix = \substr($uri, 0, $queryStart + 1);
        $query  = \substr($uri, $queryStart + 1);

        // "#" is not a fragment delimiter here: a fragment is never sent to the server, and PHP parses the whole
        // query string into $_GET treating "#" as an ordinary character, so the entire query is parsed the same way.
        $separators = \preg_quote($this->queryParameterSeparators(), '/');
        $parts      = \preg_split('/([' . $separators . '])/', $query, -1, \PREG_SPLIT_DELIM_CAPTURE);
        if ($parts === false) {
            // unreachable with this fixed pattern, but never log an unparsed query: it may still carry the credential
            return $prefix . '***';
        }
        foreach ($parts as $index => $part) {
            // odd indices are the captured separators, and a pair without "=" carries no value to redact
            if ($index % 2 === 1 || !\str_contains($part, '=')) {
                continue;
            }
            \parse_str($part, $parsed);
            foreach (\array_keys($parsed) as $name) {
                if (\strtolower((string)$name) === 'jtlauth') {
                    $parts[$index] = \explode('=', $part, 2)[0] . '=***';
                    break;
                }
            }
        }

        return $prefix . \implode('', $parts);
    }

    /**
     * The characters PHP treats as query-argument separators when it parses the request into $_GET. Every character in
     * arg_separator.input is a separator; the default is "&". Overridable so the semicolon path can be regression
     * tested (the ini setting is PHP_INI_PERDIR and cannot be changed at runtime).
     *
     * @return string
     */
    protected function queryParameterSeparators(): string
    {
        $separators = \ini_get('arg_separator.input');
        if ($separators === false || $separators === '') {
            return '&';
        }

        return $separators;
    }

    /**
     * @param LogRecord $record
     *
     * @return LogRecord
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra = \array_merge($record->extra, $this->extraFields);

        return $record;
    }
}
