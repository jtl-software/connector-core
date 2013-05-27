<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */
namespace jtl\Connector\Application;

/**
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface IEndpointConnector
{
    /**
     * Checks whether or not a method can be handled
     */
    public function canHandle();

    /**
     *
     * @param integer $id
     * @param string|array|object $params            
     * @return \jtl\Connector\Result\Action
     */
    public function handle($id, $params = null);
}
?>