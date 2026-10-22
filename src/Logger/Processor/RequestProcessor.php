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
        /** @var array<string, string> $get */
        $get = $_GET;

        $this->extraFields = [
            'http_method' => $server['REQUEST_METHOD'] ?? '',
            'user_agent'  => $server['HTTP_USER_AGENT'] ?? '',
            'domain'      => $server['HTTP_HOST'] ?? $server['SERVER_NAME'] ?? ''
        ];

        // strip jtlauth value from uri
        $uri     = $server['REQUEST_URI'] ?? '';
        $session = $get['jtlauth'] ?? '';
        if ($session !== '') {
            // string replace is faster as regex
            $uri = \str_replace(\sprintf('jtlauth=%s', $session), 'jtlauth=***', $uri);
        }
        $this->extraFields['uri'] = $uri;

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
