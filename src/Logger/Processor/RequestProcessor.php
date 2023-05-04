<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Processor;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class RequestProcessor implements ProcessorInterface
{
    /**
     * @var array<string, string>
     */
    protected $extraFields = [];

    public function __construct()
    {
        $this->extraFields = [
            'http_method'     => $_SERVER['REQUEST_METHOD'] ?? '',
            'user_agent'      => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'domain'          => $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '',
        ];

        // strip jtlauth value from uri
        $uri     = $_SERVER['REQUEST_URI'] ?? '';
        $session = $_GET['jtlauth'] ?? '';
        if ($session !== '') {
            // string replace is faster as regex
            $uri = \str_replace(\sprintf('jtlauth=%s', $session), 'jtlauth=***', $uri);
        }
        $this->extraFields['uri'] = $uri;

        // post request size
        $requestSize = (float) \strlen(\file_get_contents('php://input'));
        $unit        = 'B';
        if ($requestSize > 1024 && $requestSize < 1024 * 1024) {
            $requestSize /= 1024;
            $unit         = 'KB';
        } elseif ($requestSize > 1024 * 1024) {
            $requestSize /= 1024 * 1024;
            $unit         = 'MB';
        }

        $this->extraFields['request_size'] = \sprintf('%.1F %s', $requestSize, $unit);
    }

    /**
     * multiple param and return types are needed because some connectors use an older version of monolog
     * @param array|LogRecord $record
     * @return array|LogRecord
     */
    public function __invoke($record)
    {
        if (\is_array($record)) {
            $record['extra'] = \array_merge($record['extra'], $this->extraFields);
        } else {
            $record->extra = \array_merge($record->extra, $this->extraFields);
        }

        return $record;
    }
}
