<?php

declare(strict_types=1);

namespace MyPlugin;

use DI\Container;
use Jtl\Connector\Core\Config\CoreConfigInterface;
use Jtl\Connector\Core\Plugin\PluginInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Bootstrap implements PluginInterface
{
    public function registerListener(
        CoreConfigInterface $config,
        Container           $container,
        EventDispatcher     $eventDispatcher
    ): void {
        // TODO: Implement registerListener() method.
    }
}
