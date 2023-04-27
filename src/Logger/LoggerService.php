<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger;

use Jtl\Connector\Core\Exception\LoggerException;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonoLogger;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\ProcessorInterface;
use Monolog\Processor\PsrLogMessageProcessor;
use Psr\Log\InvalidArgumentException;
use ReflectionException;
use RuntimeException;

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
    protected string             $logLevel;
    protected int                $maxFiles = 7;


    /**
     * LoggerFactory constructor.
     *
     * @param string $logDir
     * @param string $logLevel
     * @param int    $maxFiles
     */
    public function __construct(string $logDir, string $logLevel, int $maxFiles = 7)
    {
        $this->logDir   = $logDir;
        $this->logLevel = $logLevel;
        $this->maxFiles = $maxFiles;
        $this
            ->pushProcessor(new IntrospectionProcessor())
            ->pushProcessor(new PsrLogMessageProcessor());
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

        $logLevel = MonoLogger::toMonologLevel($this->logLevel); //@phpstan-ignore-line
        if (!$this->channels[$channel]->isHandling($logLevel)) {
            $fileName = \sprintf('%s/%s.log', $this->logDir, $channel);
            $handler  = new RotatingFileHandler($fileName, $this->maxFiles, $logLevel);
            if (isset($this->formatter)) {
                $handler->setFormatter($this->formatter);
            }
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
                if ($handler instanceof AbstractProcessingHandler) {
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
