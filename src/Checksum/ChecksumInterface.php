<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Checksum;

/**
 * Interface ChecksumInterface
 * @package Jtl\Connector\Core\Checksum
 */
interface ChecksumInterface
{
    /**
     * @param IChecksumLoader $checksumLoader
     * @return IChecksumLoader
     */
    public function setChecksumLoader(IChecksumLoader $checksumLoader): IChecksumLoader;

    /**
     * @return IChecksumLoader
     */
    public function getChecksumLoader(): IChecksumLoader;
}