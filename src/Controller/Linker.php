<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Linker\IdentityLinker;

/**
 * Base Linker Controller
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class Linker extends AbstractController
{
    public function clear()
    {
        $identityLinker = IdentityLinker::getInstance();
        return $identityLinker->clear();
    }
}
