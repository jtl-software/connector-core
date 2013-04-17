<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application 
 */

namespace jtl\Connector\Controller;

use \jtl\Core\Controller\Controller as CoreController;

/**
 * Base Config Controller
 * 
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Config extends CoreController
{
  /**
   * Reads the controller configuration and returns it.
   * 
   * @param mixed $params 
   */
  public function read($params = null)
  {
    //todo: handle params
  }
}