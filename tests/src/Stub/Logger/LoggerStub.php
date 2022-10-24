<?php

namespace Jtl\Connector\Core\Test\Stub\Logger;

use Monolog\Logger as MonoLogger;

/**
 * Class LoggerStub
 * @package Jtl\Connector\Core\Test\Stub\Logger
 */
class LoggerStub
{
    public const CHANNEL_CHECKSUM = 'checksum';
    public const CHANNEL_GLOBAL   = 'global';
    public const CHANNEL_LINKER   = 'linker';
    public const CHANNEL_RPC      = 'rpc';
    public const CHANNEL_SESSION  = 'session';

    public const INFO    = 'info';
    public const WARNING = 'warning';
    public const DEBUG   = 'debug';
    public const ERROR   = 'error';

    protected static $logLevelMappings = [
        self::INFO    => MonoLogger::INFO,
        self::WARNING => MonoLogger::WARNING,
        self::ERROR   => MonoLogger::ERROR,
        self::DEBUG   => MonoLogger::DEBUG,
    ];
}
