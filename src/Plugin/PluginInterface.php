<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Plugin;

use DI\Container;
use Jtl\Connector\Core\Config\CoreConfigInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

interface PluginInterface
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
    );
}
