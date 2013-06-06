<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Exporter;

/**
 * Export interface
 * 
 * @author David Spickers <david.spickers@jtl-software.de>
 */
interface IExporter
{

    public function load($array);
}