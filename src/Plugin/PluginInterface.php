<?php
namespace Jtl\Connector\Core\Plugin;

use Symfony\Component\EventDispatcher\EventDispatcher;

interface PluginInterface
{
    public function registerListener(EventDispatcher $dispatcher);
}
