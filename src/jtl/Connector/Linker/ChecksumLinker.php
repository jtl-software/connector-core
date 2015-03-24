<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Linker
 */
namespace jtl\Connector\Linker;

use \jtl\Connector\Checksum\IChecksumLoader;
use \jtl\Connector\Checksum\IChecksum;
use \jtl\Connector\Core\Model\Model;
use \jtl\Connector\Core\Logger\Logger;

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

    /**
     * @param \jtl\Connector\Core\Model\Model $model
     * @param int $type
     */
    public static function link(Model &$model, $type = null)
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as &$checksum) {
                if ($checksum instanceof IChecksum && ($type === null || $checksum->getType() == $type)
                    && $model->getId()->getEndpoint() !== null && strlen($model->getId()->getEndpoint() > 0)) {
                    $checksum->setEndpoint(self::$loader->read($model->getId()->getEndpoint(), $checksum->getType()));

                    if ($checksum->getEndpoint() !== null) {
                        if (($checksum->getEndpoint() !== $checksum->getHost())) {
                            $checksum->setHasChanged(true);
                            self::$loader->delete($model->getId()->getEndpoint(), $checksum->getType());
                            self::$loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                        }
                    } else {
                        self::$loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                    }
                }
            }
        }
    }

    /**
     * @param \jtl\Connector\Core\Model\Model $model
     * @param int $type
     * @return \jtl\Connector\Checksum\IChecksum
     */
    public static function find(Model &$model, $type)
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as $checksum) {
                if ($checksum instanceof IChecksum && $checksum->getType() == $type) {
                    return $checksum;
                }
            }   
        }

        return null;
    }
}