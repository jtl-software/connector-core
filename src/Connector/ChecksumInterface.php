<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Checksum\IChecksumLoader;

/**
 * Interface ChecksumInterface
 * @package Jtl\Connector\Core\Checksum
 */
interface ChecksumInterface
{
    /**
     * @return IChecksumLoader
     */
    public function getChecksumLoader(): IChecksumLoader;
}
