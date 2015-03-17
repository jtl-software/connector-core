<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Linker
 */
namespace jtl\Connector\Linker;

use \jtl\Connector\Checksum\IChecksumLoader;
use \jtl\Connector\Checksum\IChecksum;

/**
 * Identity Connector Linker
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class ChecksumLinker
{
    protected static $loader;

    public static function setChecksumLoader(IChecksumLoader $loader)
    {
        self::$loader = $loader;
    }

    public static function link(DataModel &$model, $type)
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as &$checksum) {
                if ($checksum instanceof IChecksum) {
                    $checksum->setEndpoint($loader->read($model->getId()->getEndpoint(), $type));

                    if ($checksum->getEndpoint() !== null && $checksum->getEndpoint() === $checksum->getHost()) {
                        $checksum->setHasChanged(true);
                    }
                }
            }
        }
    }
}