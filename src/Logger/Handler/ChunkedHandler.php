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
    private HandlerInterface $nextHandler;

    private int $chunkSize = self::MAX_LOG_ENTRY_LENGTH;


    public const
        MAX_LOG_ENTRY_LENGTH = 31320;

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
    public function isHandling($record): bool
    {
        return $this->nextHandler->isHandling($record);
    }

    /**
     * @inheritDoc
     */
    public function handle($record): bool
    {
        // false means continue to bubble
        $return = false;

        $useArray = false;

        if (\class_exists(LogRecord::class) && $record instanceof LogRecord && !\is_array($record)) {
            $message = $record->message;
        } else {
            $message  = $record['message'];
            $useArray = true;
        }
        if ($this->chunkSize > 0 && \is_string($message) && \strlen($message) > $this->chunkSize) {
            $chunks   = \str_split($message, $this->chunkSize);
            $total    = \count($chunks);
            $recordId = \md5($message);
            $extra    = $useArray ? $record['extra'] : $record->extra;
            $extra    = \array_merge($extra, ['recordId' => $recordId]);
            foreach ($chunks as $key => $chunk) {
                $message = \sprintf("(part %d/%d) %s", $key, $total, $chunk);

                if ($useArray) {
                    $newRecord = [
                        'level' => $record['level'],
                        'context' => $record['context'],
                        'channel' => $record['channel'],
                        'datetime' => $record['datetime'],
                        'extra' => $extra,
                        'message' => $message,
                    ];
                } else {
                    $newRecord = new LogRecord(
                        $record->datetime,
                        $record->channel,
                        $record->level,
                        $message,
                        $record->context,
                        $extra,
                    );
                }

                $return = $this->nextHandler->handle($newRecord) ?: $return;
            }
            return $return;
        }
        return $this->nextHandler->handle($record);
    }

    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if (
            $this->nextHandler instanceof FormattableHandlerInterface
            || \method_exists($this->nextHandler, 'setFormatter')
        ) {
            return $this->nextHandler->setFormatter($formatter);
        }
        throw new \UnexpectedValueException(
            'The nested handler of type ' . \get_class($this->nextHandler) . ' does not support formatters.'
        );
    }

    public function getFormatter(): FormatterInterface
    {
        if (
            $this->nextHandler instanceof FormattableHandlerInterface
            || \method_exists($this->nextHandler, 'getFormatter')
        ) {
            return $this->nextHandler->getFormatter();
        }
        throw new \UnexpectedValueException(
            'The nested handler of type ' . \get_class($this->nextHandler) . ' does not support formatters.'
        );
    }
}
