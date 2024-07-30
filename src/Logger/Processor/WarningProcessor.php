<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Processor;

use DI\Container;
use Jtl\Connector\Core\Rpc\Warning;
use Jtl\Connector\Core\Rpc\Warnings;
use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class WarningProcessor implements ProcessorInterface
{
    private Container $container;
    /**
     * WarningProcessor constructor.
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->container->get(Warnings::class);
    }


    /**
     * multiple param and return types are needed because some connectors use an older version of monolog
     *
     * @param array{message:string,context:array<mixed>}|LogRecord $record
     *
     * @phpstan-param array{message:string,context:array<mixed>}   $record
     * @return array{message:string,context:array<mixed>}|LogRecord
     */
    public function __invoke(array|LogRecord $record): array|LogRecord
    {
        $message = $record['message'] ?? '';
        if (\is_array($record)) {
            if (\is_array($record['context'])) {
                $placeholders = [];
                foreach ($record['context'] as $key => $value) {
                    $placeholders['{' . $key . '}'] = $value;
                }
                $message = \strtr($record['message'], $placeholders);
            }
        } elseif ($record instanceof LogRecord) {
            $placeholders = [];
            foreach ($record->context as $key => $value) {
                $placeholders['{' . $key . '}'] = $value;
            }
            $message = \strtr($record->message, $placeholders);
        }

        /** @var Warnings $warnings */
        $warnings = $this->container->get(Warnings::class);
        $warnings->addWarning((new Warning())->setMessage($message));
        return $record;
    }
}
