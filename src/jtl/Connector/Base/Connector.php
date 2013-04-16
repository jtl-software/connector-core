<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */

namespace jtl\Connector\Base;

use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Core\Utilities\Singleton;

/**
 * Base Connector
 * 
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Connector extends Singleton implements IEndpointConnector
{
	
}
?>