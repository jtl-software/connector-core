<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Checksum;

interface ChecksumLoaderInterface
{
    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int $type
     * @return string
     */
    public function read($endpointId, $type);

    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int $type
     * @param string $checksum
     * @return boolean
     */
    public function write($endpointId, $type, $checksum);

    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int $type
     * @return boolean
     */
    public function delete($endpointId, $type);
}
