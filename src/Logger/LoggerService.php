<?php

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Exception\LoggerException;
use Jtl\Connector\Core\Logger\Processor\RequestProcessor;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Logger as MonoLogger;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\ProcessorInterface;
use Monolog\Processor\PsrLogMessageProcessor;

class LoggerService
{
    public const
        CHANNEL_CHECKSUM = 'checksum',
        CHANNEL_ERROR    = 'error',
        CHANNEL_GLOBAL   = 'global',
        CHANNEL_LINKER   = 'linker',
        CHANNEL_RPC      = 'rpc',
        CHANNEL_SESSION  = 'session';

    /**
     * @var MonoLogger[]
     */
    protected $channels = [];

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
     * @var integer
     */
    protected $maxFiles = 2;

    /**
     * @var ProcessorInterface
     */
    protected $processors = [];

    /**
     * Final handler that gets wrapped by FingersCrossedHandler
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * FingersCrossedHandler for combined log file
     * @var HandlerInterface
     */
    protected $combinedHandler;

    /**
     * LoggerFactory constructor.
     * @param string $logDir
     * @param string $logLevel
     * @param int $maxFiles
     */
    public function __construct(string $logDir, string $logLevel, int $maxFiles = 2)
    {
        $this->logDir   = $logDir;
        $this->logLevel = $logLevel;
        $this->maxFiles = $maxFiles;
        $this
            // should work with FingerCrossedHandler, might add useless data
            ->pushProcessor(new IntrospectionProcessor())
            ->pushProcessor(new PsrLogMessageProcessor())
            ->pushProcessor(new MemoryPeakUsageProcessor())
            ->pushProcessor(new RequestProcessor())
            ->pushProcessor(new HostnameProcessor());

        $fileName              = \sprintf('%s/combined.log', $this->logDir);
        $this->combinedHandler = new RotatingFileHandler($fileName, $this->maxFiles, Logger::DEBUG);
        $this->createHandler();
    }

    /**
     * @param string $logLevel
     * @return void
     */
    public function setLogLevel(string $logLevel): void
    {
        $this->logLevel = $logLevel;
        $this->createHandler();
        // need to close all channels to update the handler
        foreach ($this->channels as $channel) {
            $channel->close();
        }
        $this->channels = [];
    }

    /**
     * (re-)created the handler for the combined log file
     * @return void
     */
    protected function createHandler(): void
    {
        // needed if we change the passthru level
        if ($this->handler instanceof FingersCrossedHandler) {
            $this->handler->close();
        }
        $handler = new FingersCrossedHandler($this->combinedHandler, Logger::ERROR, 0, true, true, $this->logLevel);
        if (!\is_null($this->formatter)) {
            $handler->setFormatter($this->formatter);
        }
        $this->handler = $handler;
    }

    /**
     * @param string $channel
     * @return boolean
     */
    public function has(string $channel): bool
    {
        return isset($this->channels[\lcfirst($channel)]);
    }

    /**
     * creates legacy handler for each channel
     * @param string $channel
     * @param Level|int $logLevel
     * @return HandlerInterface
     */
    protected function createChannelSpecificHandler(string $channel, $logLevel): HandlerInterface
    {
        $fileName = \sprintf('%s/%s.log', $this->logDir, $channel);
        $handler  = new RotatingFileHandler($fileName, $this->maxFiles, $logLevel);
        if (!\is_null($this->formatter)) {
            $handler->setFormatter($this->formatter);
        }
        return $handler;
    }

    /**
     * @param string $channel
     * @return MonoLogger
     */
    public function get(string $channel): MonoLogger
    {
        $channel = \lcfirst($channel);
        if (!$this->has($channel)) {
            $this->channels[$channel] = new MonoLogger($channel);
        }

        $logLevel = MonoLogger::toMonologLevel($this->logLevel);
        if (!$this->channels[$channel]->isHandling($logLevel)) {
            $handler = $this->createChannelSpecificHandler($channel, $logLevel);
            $this->channels[$channel]->pushHandler($handler);
            $this->channels[$channel]->pushHandler($this->handler);
            foreach ($this->processors as $processor) {
                $this->channels[$channel]->pushProcessor($processor);
            }
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
        $formatterClass = \sprintf('Monolog\Formatter\%sFormatter', \ucfirst($format));
        if (!\class_exists($formatterClass)) {
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

    /**
     * @param ProcessorInterface $processor
     * @return LoggerService
     */
    public function pushProcessor(ProcessorInterface $processor): self
    {
        foreach ($this->processors as $tProcessor) {
            if ($processor === $tProcessor) {
                return $this;
            }
        }

        foreach ($this->channels as $channel) {
            $channel->pushProcessor($processor);
        }

        $this->processors[] = $processor;

        return $this;
    }
}
