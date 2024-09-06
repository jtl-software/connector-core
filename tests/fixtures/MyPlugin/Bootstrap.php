<?php

declare(strict_types=1);

namespace MyPlugin;

use DI\Container;
use Jtl\Connector\Core\Config\CoreConfigInterface;
use Jtl\Connector\Core\Plugin\PluginInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Bootstrap implements PluginInterface
{
    /**
     * @param CoreConfigInterface $config
     * @param Container           $container
     * @param EventDispatcher     $dispatcher
     *
     * @return mixed
     */
    public function registerListener(
        CoreConfigInterface $config,
        Container           $container,
        EventDispatcher     $dispatcher
    ): mixed {
        // TODO: Implement registerListener() method.
        return null;
    }
}
