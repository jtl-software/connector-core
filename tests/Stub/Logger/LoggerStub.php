<?php
namespace Jtl\Connector\Test\Stub\Logger;

use Monolog\Logger as MonoLogger;

/**
 * Class LoggerStub
 * @package Jtl\Connector\Test\Stub\Logger
 */
class LoggerStub
{
    const CHANNEL_CHECKSUM = 'checksum';
    const CHANNEL_GLOBAL = 'global';
    const CHANNEL_LINKER = 'linker';
    const CHANNEL_RPC = 'rpc';
    const CHANNEL_SESSION = 'session';

    const INFO = 'info';
    const WARNING = 'warning';
    const DEBUG = 'debug';
    const ERROR = 'error';

    protected static $logLevelMappings = [
        self::INFO => MonoLogger::INFO,
        self::WARNING => MonoLogger::WARNING,
        self::ERROR => MonoLogger::ERROR,
        self::DEBUG => MonoLogger::DEBUG,
    ];
}