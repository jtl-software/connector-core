<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core
 */

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Config\ConfigSchema;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonoLogger;

class Logger
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

    /**
     * @var string|null
     */
    protected static $format;

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
     */
    public static function write(string $message, string $level = self::INFO, string $channel = self::CHANNEL_GLOBAL): void
    {
        $config = GlobalConfig::getInstance();

        $logLevelOption = $config->get(ConfigSchema::LOG_LEVEL, self::INFO);
        $logLevel = MonoLogger::INFO;
        if (isset(self::$logLevelMappings[$logLevelOption])) {
            $logLevel = self::$logLevelMappings[$logLevelOption];
        }

        $log = self::getLogger($channel);
        if (!$log->isHandling($logLevel)) {
            $path = sprintf('%s/%s.log', $config->get(ConfigSchema::LOG_DIR), $channel);
            $handler = new RotatingFileHandler($path, 2, $logLevel);
            if(!is_null(self::$format)) {
                $formatterClass = sprintf('Monolog\Formatter\%sFormatter', ucfirst(self::$format));
                if(class_exists($formatterClass)) {
                    $handler->setFormatter(new $formatterClass());
                }
            }
            $log->pushHandler($handler);
        }

        $log->log($level, $message);
    }

    /**
     * @param \Throwable $exception
     * @param string $level
     * @param string $channel
     */
    public static function writeException(\Throwable $exception, string $level = self::ERROR, string $channel = self::CHANNEL_GLOBAL)
    {
        self::write(self::createExceptionInfos($exception, false), $level, $channel);
        self::write($exception->getMessage(), $level, $channel);
        self::write($exception->getTraceAsString(), self::DEBUG, $channel);
    }

    /**
     * @param \Throwable $exception
     * @param bool $maskFilePath
     * @param string|null $additionalMessage
     * @return string
     */
    public static function createExceptionInfos(\Throwable $exception, bool $maskFilePath, string $additionalMessage = null): string
    {
        $config = GlobalConfig::getInstance();

        $file = $exception->getFile();
        if ($maskFilePath) {
            $file = sprintf('...%s', substr($file, strlen($config->get(ConfigSchema::CONNECTOR_DIR, __DIR__))));
        }

        $infos = sprintf(
            "%s (Code: %s) in %s:%s",
            get_class($exception),
            $exception->getCode(),
            $file,
            $exception->getLine()
        );

        if (is_string($additionalMessage)) {
            $infos .= sprintf(' - %s', $additionalMessage);
        }

        return $infos;
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

    /**
     * @param string $format
     */
    public static function setFormat(string $format): void
    {
        self::$format = $format;
    }
}
