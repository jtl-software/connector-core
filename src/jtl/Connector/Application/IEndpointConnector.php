<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Application;

/**
 * 
 * 
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface IEndpointConnector
{
    /**
     * 
     * @param string $method
     */
    public function canHandle($method);
    
    
    /**
     * @param integer $method
     * @param string $method
     * @param array $params
     */
	public function handle($id, $method, array $params = null);
}
?>