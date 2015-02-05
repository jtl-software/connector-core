<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Application
 */
namespace jtl\Connector\Core\Application;

use \jtl\Connector\Core\Utilities\Singleton;

/**
 * Core Application Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Application extends Singleton
{

    /**
     * Main run Methode
     */
    abstract public function run();
}
