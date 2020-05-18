<?php
namespace MyPlugin;

use Jtl\Connector\Core\Plugin\PluginInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Bootstrap implements PluginInterface
{
    public function registerListener(EventDispatcher $dispatcher)
    {
        // TODO: Implement registerListener() method.
    }
}