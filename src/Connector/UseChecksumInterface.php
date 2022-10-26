<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Checksum\ChecksumLoaderInterface;

/**
 * Interface ChecksumInterface
 * @package Jtl\Connector\Core\Checksum
 */
interface UseChecksumInterface
{
    /**
     * @return ChecksumLoaderInterface
     */
    public function getChecksumLoader(): ChecksumLoaderInterface;
}
