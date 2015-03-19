<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Checksum;

interface IChecksum
{
    /**
     * @param string $endpointId
     * @return self
     */
    public function setEndpoint($endpoint);

    /**
     * @return string
     */
    public function getEndpoint();

    /**
     * @param string $host
     * @return self
     */
    public function setHost($host);

    /**
     * @return string
     */
    public function getHost();

    /**
     * @param int $type
     * @return self
     */
    public function setType($type);

    /**
     * @return int
     */
    public function getType();

    /**
     * @param boolean $hasChanged
     * @return self
     */
    public function setHasChanged($hasChanged);

    /**
     * @return boolean
     */
    public function hasChanged();
}