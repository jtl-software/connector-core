<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Exception\LoggerException;
use Jtl\Connector\Core\Logger\Processor\RequestProcessor;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonoLogger;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\ProcessorInterface;
use Monolog\Processor\PsrLogMessageProcessor;
use Psr\Log\LogLevel;
use Psr\Log\InvalidArgumentException;
use ReflectionException;
use RuntimeException;
use UnexpectedValueException;

/**
 * @phpstan-import-type Record from MonoLogger
 * @phpstan-import-type LevelName from MonoLogger
 * @phpstan-import-type Level from MonoLogger
 */
class LoggerService
{
    public const
        CHANNEL_CHECKSUM = 'checksum',
        CHANNEL_ERROR    = 'error',
        CHANNEL_GLOBAL   = 'global',
        CHANNEL_LINKER   = 'linker',
        CHANNEL_RPC      = 'rpc',
        CHANNEL_SESSION  = 'session';

    /** @var MonoLogger[] */
    protected array $channels = [];

    /** @var ProcessorInterface[] */
    protected array $processors = [];

    protected FormatterInterface $formatter;
    protected string             $logDir;
    /** @phpstan-var Level|LevelName|LogLevel::* */
    protected $logLevel;
    protected int                $maxFiles = 2;
    /* Final handler that gets wrapped by FingersCrossedHandler */
    protected HandlerInterface   $handler;
    /* FingersCrossedHandler for combined log file */
    protected HandlerInterface   $combinedHandler;

    /**
     * LoggerFactory constructor.
     *
     * @param string $logDir
     * @param int|string $logLevel
     * @param int    $maxFiles
     *
     * @phpstan-param Level|LevelName|LogLevel::* $logLevel
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws UnexpectedValueException
     */
    public function __construct(string $logDir, $logLevel, int $maxFiles = 2)
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
        $this->combinedHandler = new RotatingFileHandler($fileName, $this->maxFiles, MonoLogger::DEBUG);
        $this->createHandler();
    }

    /**
     * @param int|string $logLevel
     * @phpstan-param Level|LevelName|LogLevel::* $logLevel
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws UnexpectedValueException
     */
    public function setLogLevel($logLevel): void
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
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws UnexpectedValueException
     */
    protected function createHandler(): void
    {
        // needed if we change the passthru level
        if (isset($this->handler) && $this->handler instanceof FingersCrossedHandler) {
            $this->handler->close();
        }
        $logLevel = MonoLogger::toMonologLevel($this->logLevel);
        $handler  = new FingersCrossedHandler($this->combinedHandler, MonoLogger::ERROR, 0, true, true, $logLevel);
        if (isset($this->formatter)) {
            $handler->setFormatter($this->formatter);
        }
        $this->handler = $handler;
    }

    /**
     * @param ProcessorInterface $processor
     *
     * @return LoggerService
     */
    public function pushProcessor(ProcessorInterface $processor): self
    {
        if (\in_array($processor, $this->processors, true)) {
            return $this;
        }

        foreach ($this->channels as $channel) {
            $channel->pushProcessor($processor);
        }

        $this->processors[] = $processor;

        return $this;
    }

    /**
     * creates legacy handler for each channel
     *
     * @param string     $channel
     * @param int|string $logLevel
     *
     * @phpstan-param Level|LevelName|LogLevel::* $logLevel
     * @return HandlerInterface
     * @throws InvalidArgumentException
     */
    protected function createChannelSpecificHandler(string $channel, $logLevel): HandlerInterface
    {
        $fileName     = \sprintf('%s/%s.log', $this->logDir, $channel);
        $monologLevel = MonoLogger::toMonologLevel($logLevel);
        $handler      = new RotatingFileHandler($fileName, $this->maxFiles, $monologLevel);
        if (isset($this->formatter)) {
            $handler->setFormatter($this->formatter);
        }
        return $handler;
    }

    /**
     * @param string $channel
     *
     * @return MonoLogger
     * @throws InvalidArgumentException
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
            $this->channels[$channel]->pushHandler($this->handler);
            $this->channels[$channel]->pushHandler($handler);
            foreach ($this->processors as $processor) {
                $this->channels[$channel]->pushProcessor($processor);
            }
        }

        return $this->channels[$channel];
    }

    /**
     * @param string $channel
     *
     * @return boolean
     */
    public function has(string $channel): bool
    {
        return isset($this->channels[\lcfirst($channel)]);
    }

    /**
     * @param FormatterInterface $formatter
     *
     * @return LoggerService
     */
    public function setFormatter(FormatterInterface $formatter): self
    {
        foreach ($this->channels as $channel) {
            foreach ($channel->getHandlers() as $handler) {
                if ($handler instanceof FormattableHandlerInterface) {
                    $handler->setFormatter($formatter);
                }
            }
        }
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * @param string               $format
     * @param array{}|array<mixed> $arguments
     *
     * @return LoggerService
     * @throws LoggerException
     * @throws RuntimeException
     * @throws ReflectionException
     */
    public function setFormat(string $format, array $arguments = []): self
    {
        $formatterClass = \sprintf('Monolog\Formatter\%sFormatter', \ucfirst($format));
        if (!\class_exists($formatterClass)) {
            throw LoggerException::formatterNotExists($formatterClass);
        }
        $formatter = (new \ReflectionClass($formatterClass))->newInstanceArgs($arguments);
        if (!($formatter instanceof FormatterInterface)) {
            throw new \RuntimeException('Formatter ' . $formatterClass . ' not found.');
        }

        $this->setFormatter($formatter);

        return $this;
    }
}
