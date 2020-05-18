<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */

namespace Jtl\Connector\Core\Linker;

use Jtl\Connector\Core\Checksum\ChecksumLoaderInterface;
use Jtl\Connector\Core\Checksum\ChecksumInterface;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Logger\Logger;

class ChecksumLinker
{
    /**
     * @var ChecksumLoaderInterface
     */
    protected $loader;

    /**
     * ChecksumLinker constructor.
     * @param ChecksumLoaderInterface $loader
     */
    public function __construct(ChecksumLoaderInterface $loader = null)
    {
        $this->loader = $loader;
    }

    /**
     * @param AbstractModel $model
     * @param int $type
     */
    public function link(AbstractModel &$model, $type = null): void
    {
        if (!is_null($this->loader) && method_exists($model, 'getChecksums')) {
            $checksums = $model->getChecksums();
            foreach ($checksums as &$checksum) {
                if ($checksum instanceof ChecksumInterface && ($type === null || $checksum->getType() == $type)) {
                    Logger::write(sprintf('Checksum linking type (%s)...', $type), Logger::DEBUG, Logger::CHANNEL_CHECKSUM);

                    if ($model->getId()->getEndpoint() !== null && strlen($model->getId()->getEndpoint()) > 0) {
                        $checksum->setEndpoint($this->loader->read($model->getId()->getEndpoint(), $checksum->getType()));

                        if ($checksum->getEndpoint() !== null && strlen($checksum->getEndpoint()) > 0) {
                            if (($checksum->getEndpoint() !== $checksum->getHost())) {
                                Logger::write(sprintf('Changed checksum for endpoint (%s) type (%s)', $model->getId()->getEndpoint(), $type), Logger::DEBUG, Logger::CHANNEL_CHECKSUM);
                                $checksum->setHasChanged(true);
                                $this->loader->delete($model->getId()->getEndpoint(), $checksum->getType());
                                $this->loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                            }
                        } else {
                            Logger::write(sprintf('Write new checksum for endpoint (%s) type (%s)', $model->getId()->getEndpoint(), $type), Logger::DEBUG, Logger::CHANNEL_CHECKSUM);
                            $checksum->setHasChanged(true);
                            $this->loader->write($model->getId()->getEndpoint(), $checksum->getType(), $checksum->getHost());
                        }
                    } else {
                        Logger::write(sprintf('New checksum with empty endpoint type (%s)', $model->getId()->getEndpoint(), $type), Logger::DEBUG, Logger::CHANNEL_CHECKSUM);
                        $checksum->setHasChanged(true);
                    }
                }
            }
        }
    }

    /**
     * @param ChecksumInterface $checksum
     * @return boolean
     */
    public function save(ChecksumInterface $checksum): bool
    {
        if (is_null($this->loader)) {
            return true;
        }

        if (strlen($checksum->getForeignKey()->getEndpoint()) > 0 && $checksum->getForeignKey()->getHost()) {
            $this->loader->delete($checksum->getForeignKey()->getEndpoint(), $checksum->getType());
            $this->loader->write($checksum->getForeignKey()->getEndpoint(), $checksum->getType(), $checksum->getHost());
            return true;
        }

        return false;
    }

    /**
     * @param AbstractModel $model
     * @param int $type
     * @return ChecksumInterface
     */
    public static function find(AbstractModel $model, $type): ?ChecksumInterface
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as $checksum) {
                if ($checksum instanceof ChecksumInterface && $checksum->getType() == $type) {
                    return $checksum;
                }
            }
        }

        return null;
    }

    /**
     * @param AbstractModel $model
     * @param string $endpoint
     * @param int $type
     * @return ChecksumInterface
     */
    public static function findByEndpoint(AbstractModel $model, $endpoint, $type): ?ChecksumInterface
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as $checksum) {
                if ($checksum instanceof ChecksumInterface && $checksum->getType() == $type && $checksum->getForeignKey()->getEndpoint() === $endpoint) {
                    return $checksum;
                }
            }
        }

        return null;
    }

    /**
     * @param AbstractModel $model
     * @param int $host
     * @param int $type
     * @return ChecksumInterface
     */
    public static function findByHost(AbstractModel $model, $host, $type): ?ChecksumInterface
    {
        if (method_exists($model, 'getChecksums')) {
            foreach ($model->getChecksums() as $checksum) {
                if ($checksum instanceof ChecksumInterface && $checksum->getType() == $type && $checksum->getForeignKey()->getHost() == $host) {
                    return $checksum;
                }
            }
        }

        return null;
    }
}
