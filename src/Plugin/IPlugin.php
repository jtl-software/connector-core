<?php
namespace Jtl\Connector\Core\Plugin;

use Symfony\Component\EventDispatcher\EventDispatcher;

interface IPlugin
{
    public function registerListener(EventDispatcher $dispatcher);
}
