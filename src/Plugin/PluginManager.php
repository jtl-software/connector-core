<?php
namespace Jtl\Connector\Core\Plugin;

use Jtl\Connector\Core\IO\Path;
use Symfony\Component\Finder\Finder;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PluginManager
{
    /**
     * @param EventDispatcher $dispatcher
     */
    public static function loadPlugins(EventDispatcher $dispatcher)
    {
        $dir = Path::combine(CONNECTOR_DIR, 'plugins');
        $finder = new Finder();

        $finder->files()->name('/(b|B)ootstrap.php/')->in($dir);
        foreach ($finder as $file) {
            include($file->getPathName());

            $class = sprintf('\\%s\\Bootstrap', str_replace(DIRECTORY_SEPARATOR, '\\', $file->getRelativePath()));
            if (class_exists($class)) {
                $plugin = new $class();
                if ($plugin instanceof PluginInterface) {
                    $plugin->registerListener($dispatcher);
                }
            }
        }
    }
}
