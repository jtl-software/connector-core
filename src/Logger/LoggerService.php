<?php

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Exception\LoggerException;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonoLogger;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\PsrLogMessageProcessor;

class LoggerService
{
    public const
        CHANNEL_CHECKSUM = 'checksum',
        CHANNEL_ERROR = 'error',
        CHANNEL_GLOBAL = 'global',
        CHANNEL_LINKER = 'linker',
        CHANNEL_RPC = 'rpc',
        CHANNEL_SESSION = 'session';

    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * @var string
     */
    protected $logDir;

    /**
     * @var string
     */
    protected $logLevel;

    /**
     * @var MonoLogger[]
     */
    protected $channels = [];

    /**
     * @var integer
     */
    protected $maxFiles = 7;

    /**
     * LoggerFactory constructor.
     * @param string $logDir
     * @param string $logLevel
     * @param int $maxFiles
     */
    public function __construct(string $logDir, string $logLevel, int $maxFiles = 7)
    {
        $this->logDir = $logDir;
        $this->logLevel = $logLevel;
        $this->maxFiles = $maxFiles;
    }

    /**
     * @param string $channel
     * @return boolean
     */
    public function has(string $channel): bool
    {
        return isset($this->channels[lcfirst($channel)]);
    }

    /**
     * @param string $channel
     * @return MonoLogger
     */
    public function get(string $channel): MonoLogger
    {
        $channel = lcfirst($channel);
        if (!$this->has($channel)) {
            $this->channels[$channel] = new MonoLogger($channel);
        }

        $logLevel = MonoLogger::toMonologLevel($this->logLevel);
        if (!$this->channels[$channel]->isHandling($logLevel)) {
            $fileName = sprintf('%s/%s.log', $this->logDir, $channel);
            $handler = new RotatingFileHandler($fileName, $this->maxFiles, $logLevel);
            if(!is_null($this->formatter)) {
                $handler->setFormatter($this->formatter);
            }
            $this->channels[$channel]->pushHandler($handler);
            $this->channels[$channel]->pushProcessor(new IntrospectionProcessor());
            $this->channels[$channel]->pushProcessor(new PsrLogMessageProcessor());
        }

        return $this->channels[$channel];
    }

    /**
     * @param string $format
     * @param array $arguments
     * @return LoggerService
     * @throws \ReflectionException|LoggerException
     */
    public function setFormat(string $format, array $arguments = []): self
    {
        $formatterClass = sprintf('Monolog\Formatter\%sFormatter', ucfirst($format));
        if (!class_exists($formatterClass)) {
            throw LoggerException::formatterNotExists($formatterClass);
        }
        $formatter = (new \ReflectionClass($formatterClass))->newInstanceArgs($arguments);
        $this->setFormatter($formatter);
        return $this;
    }

    /**
     * @param FormatterInterface $formatter
     * @return LoggerService
     */
    public function setFormatter(FormatterInterface $formatter): self
    {
        foreach ($this->channels as $channel) {
            foreach ($channel->getHandlers() as $handler) {
                if ($handler instanceof AbstractProcessingHandler) {
                    $handler->setFormatter($formatter);
                }
            }
        }
        $this->formatter = $formatter;
        return $this;
    }
}