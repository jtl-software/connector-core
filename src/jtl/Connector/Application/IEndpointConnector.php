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
	public function handle($method, array $params);
}
?>