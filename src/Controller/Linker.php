<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Controller;


/**
 * Base Linker Controller
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class Linker extends AbstractController
{
    /**
     * @param null $params
     * @return bool
     */
    public function clear($params = null)
    {
        //TODO: set type in clear method
        return $this->application->getLinker()->clear();
    }
}
