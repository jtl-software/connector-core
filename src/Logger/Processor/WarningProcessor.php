<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Processor;

use Jtl\Connector\Core\Rpc\Warnings;
use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class WarningProcessor implements ProcessorInterface
{
    public const string SEND_TO_WAWI = 'sendToWawi';

    private Warnings $warnings;

    /**
     * WarningProcessor constructor.
     *
     * @param Warnings $warnings
     */
    public function __construct(Warnings $warnings)
    {
        $this->warnings = $warnings;
    }


    /**
     * @param LogRecord $record
     *
     * @return LogRecord
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        if (
            isset($record->context[self::SEND_TO_WAWI]) &&
            (bool)$record->context[self::SEND_TO_WAWI]
        ) {
            $this->warnings->addWarning($record->message);
        }

        return $record;
    }
}
