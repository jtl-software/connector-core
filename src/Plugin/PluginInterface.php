<?php

namespace Jtl\Connector\Core\Plugin;

use DI\Container;
use Noodlehaus\ConfigInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

interface PluginInterface
{
    public function registerListener(ConfigInterface $config, Container $container, EventDispatcher $dispatcher);
}
