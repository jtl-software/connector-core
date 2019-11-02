<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core
 */
namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Application\Application;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;

class Logger extends \Monolog\Logger
{
    const CHANNEL_CHECKSUM = 'checksum';
    const CHANNEL_DATABASE = 'database';
    const CHANNEL_ERROR = 'error';
    const CHANNEL_GLOBAL = 'global';
    const CHANNEL_LINKER = 'linker';
    const CHANNEL_RPC = 'rpc';
    const CHANNEL_SECURITY = 'security';

    /**
     * @param string $message
     * @param integer $level
     * @param string $channel
     * @return boolean
     */
    public static function write(string $message, int $level = self::ERROR, string $channel = self::CHANNEL_GLOBAL): bool
    {
        if ($level === self::DEBUG && getenv(Application::ENV_VAR_DEBUG_LOGGING) !== 'true') {
            return false;
        }

        if (defined('LOG_DIR')) {
            $path = [
                LOG_DIR,
                "{$channel}.log"
            ];
        } else {
            $path = [
                CONNECTOR_DIR,
                'logs',
                "{$channel}.log"
            ];
        }
        
        $log = self::getLogger($channel);
        if (!$log->isHandling($level)) {
            $log->pushHandler(new RotatingFileHandler(implode(DIRECTORY_SEPARATOR, $path)), 2, $level);
        }

        return @$log->log($level, $message);
    }

    /**
     * Gets the current logger
     *
     * @param string $channel The log channel
     * @return \Monolog\Logger
     */
    public static function getLogger($channel): \Monolog\Logger
    {
        return LoggerFactory::get($channel);
    }
}
