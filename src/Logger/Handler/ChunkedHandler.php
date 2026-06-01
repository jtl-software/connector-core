<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Handler;

use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Handler\Handler;
use Monolog\Handler\HandlerInterface;
use Monolog\LogRecord;

class ChunkedHandler extends Handler implements FormattableHandlerInterface
{
    public const int MAX_LOG_ENTRY_LENGTH = 31320;
    private HandlerInterface $nextHandler;
    private int $chunkSize = self::MAX_LOG_ENTRY_LENGTH;

    /**
     * @param HandlerInterface $nextHandler
     * @param int|null         $chunkSize
     */
    public function __construct(HandlerInterface $nextHandler, ?int $chunkSize = null)
    {
        $this->nextHandler = $nextHandler;
        if ($chunkSize !== null) {
            $this->chunkSize = $chunkSize;
        }
    }

    /**
     * @inheritDoc
     */
    public function isHandling(LogRecord $record): bool
    {
        return $this->nextHandler->isHandling($record);
    }

    /**
     * @param LogRecord $record
     *
     * @return bool
     */
    public function handle(LogRecord $record): bool
    {
        // false means continue to bubble
        $return = false;

        $message = $record->message;
        /** @var array<mixed> $extra */
        $extra = $record->extra;

        if ($this->chunkSize > 0 && \strlen($message) > $this->chunkSize) {
            $chunks   = \str_split($message, $this->chunkSize);
            $total    = \count($chunks);
            $recordId = \md5($message);
            $extra    = \array_merge($extra, ['recordId' => $recordId]);
            foreach ($chunks as $key => $chunk) {
                $message = \sprintf("(part %d/%d) %s", $key, $total, $chunk);

                $newRecord = new LogRecord(
                    $record->datetime,
                    $record->channel,
                    $record->level,
                    $message,
                    $record->context,
                    $extra,
                );

                $return = $this->nextHandler->handle($newRecord) ?: $return;
            }

            return $return;
        }

        return $this->nextHandler->handle($record);
    }

    /**
     * @param FormatterInterface $formatter
     *
     * @return HandlerInterface
     * @throws \UnexpectedValueException
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($this->nextHandler instanceof FormattableHandlerInterface) {
            return $this->nextHandler->setFormatter($formatter);
        }
        if (\method_exists($this->nextHandler, 'setFormatter')) {
            /** @var HandlerInterface $result */
            $result = $this->nextHandler->setFormatter($formatter);
            return $result;
        }
        throw new \UnexpectedValueException(
            'The nested handler of type ' . \get_class($this->nextHandler) . ' does not support formatters.'
        );
    }

    /**
     * @return FormatterInterface
     * @throws \UnexpectedValueException
     */
    public function getFormatter(): FormatterInterface
    {
        if ($this->nextHandler instanceof FormattableHandlerInterface) {
            return $this->nextHandler->getFormatter();
        }
        if (\method_exists($this->nextHandler, 'getFormatter')) {
            /** @var FormatterInterface $result */
            $result = $this->nextHandler->getFormatter();
            return $result;
        }
        throw new \UnexpectedValueException(
            'The nested handler of type ' . \get_class($this->nextHandler) . ' does not support formatters.'
        );
    }
}
