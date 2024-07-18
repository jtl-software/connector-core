<?php

namespace Jtl\Connector\Core\Logger;

use DI\Container;
use Jtl\Connector\Core\Rpc\Warning;
use Jtl\Connector\Core\Rpc\Warnings;
use Psr\Log\LoggerTrait;

class Logger extends \Monolog\Logger
{
    private Container $container;

    use LoggerTrait {
        LoggerTrait::warning as parentWarning;
    }

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function warning($message, array $context = [], string $type = Warnings::TYPE_DEFAULT): void
    {
        $this->parentWarning($message, $context);

        /** @var Warnings $warnings */
        $warnings = $this->container->get(Warnings::WARNINGS);
        $warnings->addWarning(
            (new Warning())
                ->setType($type)
                ->setMessage($message)
        );

    }
}