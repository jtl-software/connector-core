<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core
 */

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Config\EnvConfig;
use Jtl\Connector\Core\Definition\ConfigOption;
use Jtl\Connector\Core\IO\Path;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonoLogger;

class Logger
{
    const CHANNEL_CHECKSUM = 'checksum';
    const CHANNEL_DATABASE = 'database';
    const CHANNEL_GLOBAL = 'global';
    const CHANNEL_LINKER = 'linker';
    const CHANNEL_RPC = 'rpc';

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

    /**
     * @param string $message
     * @param string $level
     * @param string $channel
     * @return boolean
     */
    public static function write(string $message, string $level = self::INFO, string $channel = self::CHANNEL_GLOBAL): bool
    {
        $envConfig = EnvConfig::getInstance();

        $logLevelOption = $envConfig->get(ConfigOption::LOG_LEVEL, self::INFO);
        $logLevel = MonoLogger::INFO;
        if(isset(self::$logLevelMappings[$logLevelOption])) {
            $logLevel = self::$logLevelMappings[$logLevelOption];
        }

        $log = self::getLogger($channel);
        if (!$log->isHandling($logLevel)) {
            $path = Path::combine(CONNECTOR_DIR, 'logs', sprintf('%s.log', $channel));
            $log->pushHandler(new RotatingFileHandler($path, 2, $logLevel));
        }

        return $log->log($level, $message);
    }

    /**
     * Gets the current logger
     *
     * @param string $channel The log channel
     * @return MonoLogger
     */
    public static function getLogger($channel): MonoLogger
    {
        return LoggerFactory::get($channel);
    }
}
