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

    public static function link(DataModel &$model, $type = null)
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as &$checksum) {
                if ($checksum instanceof IChecksum && ($type === null || $checksum->getType() == $type)) {
                    $checksum->setEndpoint(self::$loader->read($model->getId()->getEndpoint(), $checksum->getType()));

                    if ($checksum->getEndpoint() !== null) {
                        if (($checksum->getEndpoint() !== $checksum->getHost())) {
                            $checksum->setHasChanged(true);
                            self::$loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                        }
                    } else {
                        self::$loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                    }
                }
            }
        }
    }
}