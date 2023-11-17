<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Handler;

use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Handler\Handler;
use Monolog\Handler\HandlerInterface;
use Monolog\LogRecord;

class ChunkedHandler extends Handler
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
    public function isHandling(LogRecord $record): bool
    {
        return $this->nextHandler->isHandling($record);
    }

    /**
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
    {
        // false means continue to bubble
        $return  = false;
        $message = $record->message;
        if ($this->chunkSize > 0 && \strlen($message) > $this->chunkSize) {
            $chunks   = \str_split($message, $this->chunkSize);
            $total    = \count($chunks);
            $recordId = \md5($message);
            foreach ($chunks as $key => $chunk) {
                $recordArray = $record->toArray();
                $message     = \sprintf("(part %d/%d) %s", $key, $total, $chunk);

                $newRecord = new LogRecord(
                    $recordArray['datetime'],
                    $recordArray['channel'],
                    $recordArray['level'],
                    $message,
                    $recordArray['context'],
                    \array_merge($recordArray['extra'], ['recordId' => $recordId]),
                    $recordArray['formatted']
                );

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
