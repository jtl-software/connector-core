<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */

namespace jtl\Connector\Base;

use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Core\Utilities\Singleton;
use \jtl\Core\Utilities\Config\Config;
use \jtl\Core\Exception\ConnectorException;

/**
 * Base Connector
 * 
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Connector extends Singleton implements IEndpointConnector
{

  protected $config;

  /**
   * Setter connector config.
   * 
   * @param \jtl\Core\Utilities\Config $config
   */
  public function setConfig(Config $config)
  {
    $this->config = $config->load();
  }

  /**
   * Returns the config.
   * 
   * @return object
   * @throws ConnectorException
   */
  public function getConfig()
  {
    if (empty($this->config)) {
      throw new ConnectorException('The connector configuration is not set!');
    }
    return $this->config;
  }

}

?>