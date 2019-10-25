<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Authentication;

interface ITokenLoader
{
    /**
     * Loads the connector token
     *
     * @return string
     */
    public function load();
}
