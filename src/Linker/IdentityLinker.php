<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */

namespace Jtl\Connector\Core\Linker;

use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Logger\Logger;

/**
 * Identity Connector Linker
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class IdentityLinker
{
    const CACHE_TYPE_HOST = 'h';
    const CACHE_TYPE_ENDPOINT = 'e';

    /**
     * Session Database Mapper
     *
     * @var PrimaryKeyMapperInterface
     */
    protected $mapper;

    /**
     * @var bool
     */
    protected $useCache = true;

    /**
     * @var array
     */
    protected $cache = [];

    /**
     * IdentityLinker constructor.
     * @param PrimaryKeyMapperInterface $mapper
     */
    public function __construct(PrimaryKeyMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Constructor
     *
     * @param boolean $useCache
     * @return IdentityLinker
     */
    public function setUseCache(bool $useCache)
    {
        $this->useCache = $useCache;
        return $this;
    }

    /**
     * @param AbstractDataModel $model
     * @param boolean $isDeleted
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function linkModel(AbstractDataModel $model, $isDeleted = false): void
    {
        $reflect = new \ReflectionClass($model);

        foreach ($model->getModelType()->getProperties() as $propertyInfo) {
            $property = ucfirst($propertyInfo->getName());
            $setter = 'set' . $property;
            $getter = 'get' . $property;

            if ($propertyInfo->isNavigation() && $model->{$getter}() !== null) {
                if (is_array($model->{$getter}())) {
                    $list = $model->{$getter}();
                    foreach ($list as &$entity) {
                        if ($entity instanceof AbstractDataModel) {
                            $this->linkModel($entity, $isDeleted);
                        } elseif ($entity instanceof Identity && Model::isIdentityProperty($reflect->getShortName(), $propertyInfo->getName())) {
                            $this->linkIdentityList($entity, $reflect->getShortName(), $propertyInfo->getName(), $isDeleted);
                        } else {
                            Logger::write(
                                sprintf('Property (%s) from model (%s) is not an instance of DataModel or Identity', $propertyInfo->getName(), $reflect->getShortName()),
                                Logger::WARNING,
                                Logger::CHANNEL_LINKER
                            );
                        }
                    }
                } elseif ($model->{$getter}() instanceof AbstractDataModel) {
                    $entity = $model->{$getter}();
                    $this->linkModel($entity, $isDeleted);
                } else {
                    Logger::write(
                        sprintf('Property (%s) from model (%s) is not an array or an instance of DataModel', $propertyInfo->getName(), $reflect->getShortName()),
                        Logger::WARNING,
                        Logger::CHANNEL_LINKER
                    );
                }
            } elseif ($propertyInfo->isIdentity() && Model::isIdentityProperty($reflect->getShortName(), $propertyInfo->getName())) {
                $identity = $model->{$getter}();

                if (!($identity instanceof Identity)) {
                    continue;
                }

                if (strlen($identity->getEndpoint()) > 0 && $identity->getHost() > 0) {
                    if ($isDeleted) {
                        $this->delete($reflect->getShortName(), $identity->getEndpoint(), $identity->getHost());
                    } elseif (!$this->propertyHostIdExists($reflect->getShortName(), $propertyInfo->getName(), $identity->getHost())) {
                        $this->save($identity->getEndpoint(), $identity->getHost(), $reflect->getShortName(), $propertyInfo->getName());
                    }

                    continue;
                } else {
                    if ($identity->getHost() > 0) {
                        if ($isDeleted) {
                            $this->delete($reflect->getShortName(), null, $identity->getHost());
                        } elseif ($this->propertyHostIdExists($reflect->getShortName(), $propertyInfo->getName(), $identity->getHost())) {
                            $identity->setEndpoint($this->getEndpointId($reflect->getShortName(), $propertyInfo->getName(), $identity->getHost()));

                            $model->{$setter}($identity);
                        }
                    } elseif (strlen($identity->getEndpoint()) > 0) {
                        if ($isDeleted) {
                            $this->delete($reflect->getShortName(), $identity->getEndpoint(), null);
                        } elseif ($this->propertyEndpointIdExists($reflect->getShortName(), $propertyInfo->getName(), $identity->getEndpoint())) {
                            $identity->setHost($this->getHostId($reflect->getShortName(), $propertyInfo->getName(), $identity->getEndpoint()));

                            $model->{$setter}($identity);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param Identity $identity
     * @param string $modelName
     * @param string $property
     * @param bool $isDeleted
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function linkIdentityList(Identity $identity, string $modelName, string $property, bool $isDeleted = false): void
    {
        if (strlen($identity->getEndpoint()) > 0 && $identity->getHost() > 0) {
            if ($isDeleted) {
                $this->delete($modelName, $identity->getEndpoint(), $identity->getHost());
            } elseif (!$this->propertyHostIdExists($modelName, $property, $identity->getHost())) {
                $this->save($identity->getEndpoint(), $identity->getHost(), $modelName, $property);
            }
        } else {
            if ($identity->getHost() > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, null, $identity->getHost());
                } elseif ($this->propertyHostIdExists($modelName, $property, $identity->getHost())) {
                    $identity->setEndpoint($this->getEndpointId($modelName, $property, $identity->getHost()));
                }
            } elseif (strlen($identity->getEndpoint()) > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, $identity->getEndpoint());
                } elseif ($this->propertyEndpointIdExists($modelName, $property, $identity->getEndpoint())) {
                    $identity->setHost($this->getHostId($modelName, $property, $identity->getEndpoint()));
                }
            }
        }
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param int $hostId
     * @return bool
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function propertyHostIdExists(string $modelName, string $property, int $hostId): bool
    {
        if (!$this->isValidHostId($hostId)) {
            throw new LinkerException(sprintf(
                'HostId (%s) => (modelName: %s, property: %s) is invalid.',
                $hostId,
                $modelName,
                $property
            ));
        }

        $type = Model::getPropertyIdentityType($modelName, $property);
        $modelName = Model::getModelByType($type);
        return $this->hostIdExists($modelName, $hostId);
    }

    /**
     * @param string $modelName
     * @param integer $hostId
     * @return boolean
     * @throws DefinitionException
     * @throws LinkerException
     */
    public function hostIdExists(string $modelName, int $hostId): bool
    {
        if (!$this->isValidHostId($hostId)) {
            throw new LinkerException(sprintf(
                'HostId (%s) => (modelName: %s) is invalid.',
                $hostId,
                $modelName
            ));
        }

        $type = Model::getIdentityType($modelName);
        if (!$this->checkCache($hostId, $type, self::CACHE_TYPE_HOST)) {
            $endpointId = $this->mapper->getEndpointId($type, $hostId);
            if (!$this->isValidEndpointId($endpointId)) {
                return false;
            }
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_HOST);
        }

        return true;
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param string $endpointId
     * @return bool
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function propertyEndpointIdExists(string $modelName, string $property, string $endpointId): bool
    {
        if (!$this->isValidEndpointId($endpointId)) {
            throw new LinkerException(sprintf(
                'EndpointId (%s) => (modelName: %s, property: %s) is invalid.',
                $endpointId,
                $modelName,
                $property
            ));
        }

        $type = Model::getPropertyIdentityType($modelName, $property);
        $modelName = Model::getModelByType($type);
        return $this->endpointIdExists($modelName, $endpointId);
    }

    /**
     * @param string $modelName
     * @param string $endpointId
     * @return boolean
     * @throws LinkerException
     * @throws DefinitionException
     */
    public function endpointIdExists(string $modelName, string $endpointId): bool
    {
        if (!$this->isValidEndpointId($endpointId)) {
            throw new LinkerException(sprintf(
                'EndpointId (%s) => (modelName: %s) is invalid.',
                $endpointId,
                $modelName
            ));
        }

        $type = Model::getIdentityType($modelName);
        if (!$this->checkCache($endpointId, $type, self::CACHE_TYPE_ENDPOINT)) {
            $hostId = $this->mapper->getHostId($type, $endpointId);
            if (!$this->isValidHostId($hostId)) {
                return false;
            }
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_ENDPOINT);
        }

        return true;
    }

    /**
     * @param string $endpointId
     * @param int $hostId
     * @param string $modelName
     * @param string|null $property
     * @return bool
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function save(string $endpointId, int $hostId, string $modelName, string $property = null): bool
    {
        $type = is_null($property) ? Model::getIdentityType($modelName) : Model::getPropertyIdentityType($modelName, $property);
        $relatedModel = Model::getModelByType($type);
        $this->delete($relatedModel, $endpointId, $hostId);

        $result = $this->mapper->save($type, $endpointId, $hostId);
        if ($result) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_ENDPOINT);
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_HOST);

            return true;
        }

        return false;
    }

    /**
     * @param string $modelName
     * @param string|null $endpointId
     * @param integer|null $hostId
     * @return boolean
     * @throws DefinitionException
     */
    public function delete(string $modelName, string $endpointId = null, int $hostId = null): bool
    {
        $type = Model::getIdentityType($modelName);

        $result = $this->mapper->delete($type, $endpointId, $hostId);
        if ($result) {
            $this->deleteCache($type, self::CACHE_TYPE_ENDPOINT, $endpointId, null);
            $this->deleteCache($type, self::CACHE_TYPE_HOST, null, $hostId);

            return true;
        }

        return false;
    }

    /**
     * Clears the entire link table
     * @param integer $type
     * @return boolean
     */
    public function clear(int $type = null): bool
    {
        return $this->mapper->clear($type);
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param integer $hostId
     * @return string
     * @throws DefinitionException
     */
    public function getEndpointId(string $modelName, string $property, int $hostId): string
    {
        $type = Model::getPropertyIdentityType($modelName, $property);
        if (($endpointId = $this->loadCache($hostId, $type, self::CACHE_TYPE_HOST)) !== null) {
            return $endpointId;
        }

        $endpointId = (string)$this->mapper->getEndpointId($type, $hostId);

        if (strlen(trim($endpointId)) > 0) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_HOST);
        }

        return $endpointId;
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param string $endpointId
     * @return integer
     * @throws DefinitionException
     */
    public function getHostId(string $modelName, string $property, string $endpointId): int
    {
        $type = Model::getPropertyIdentityType($modelName, $property);

        if (($hostId = $this->loadCache($endpointId, $type, self::CACHE_TYPE_ENDPOINT)) !== null) {
            return $hostId;
        }

        $hostId = (int)$this->mapper->getHostId($type, $endpointId);

        if ($hostId > 0) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_ENDPOINT);
        }

        return $hostId;
    }

    /**
     * @param mixed $id
     * @param integer $type
     * @param string $cacheType
     * @return boolean
     */
    protected function checkCache($id, int $type, string $cacheType): bool
    {
        $result = $this->useCache && array_key_exists($this->buildKey($id, $type, $cacheType), $this->cache);

        // Debug
        Logger::write(sprintf(
            'Checkcache (id: %s, type: %s, cacheType: %s) with result %s',
            $id,
            $type,
            $cacheType,
            $result ? 'true' : 'false'
        ), Logger::DEBUG, Logger::CHANNEL_LINKER);

        return $result;
    }

    /**
     * @param mixed $id
     * @param int $type
     * @param string $cacheType
     * @return mixed
     */
    protected function loadCache($id, int $type, string $cacheType)
    {
        $result = $this->checkCache($id, $type, $cacheType) ? $this->cache[$this->buildKey($id, $type, $cacheType)] : null;

        // Debug
        Logger::write(sprintf(
            'LoadCache (id: %s, type: %s, cacheType: %s) with result %s',
            $id,
            $type,
            $cacheType,
            $result
        ), Logger::DEBUG, Logger::CHANNEL_LINKER);

        return $result;
    }

    /**
     * @param mixed $endpointId
     * @param int $hostId
     * @param int $type
     * @param string $cacheType
     */
    protected function saveCache(string $endpointId, int $hostId, int $type, string $cacheType)
    {
        // Debug
        Logger::write(sprintf(
            'SaveCache (endpointId: %s, hostId: %s, type: %s, cacheType: %s)',
            $endpointId,
            $hostId,
            $type,
            $cacheType
        ), Logger::DEBUG, Logger::CHANNEL_LINKER);

        if ($this->useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    $this->cache[$this->buildKey($endpointId, $type, $cacheType)] = $hostId;
                    break;
                case self::CACHE_TYPE_HOST:
                    $this->cache[$this->buildKey($hostId, $type, $cacheType)] = $endpointId;
                    break;
            }
        }
    }

    /**
     * @param int $type
     * @param string $cacheType
     * @param string|null $endpointId
     * @param int|null $hostId
     */
    protected function deleteCache(int $type, string $cacheType, string $endpointId = null, int $hostId = null)
    {
        // Debug
        Logger::write(sprintf(
            'DeleteCache (endpointId: %s, hostId: %s, type: %s, cacheType: %s)',
            $endpointId,
            $hostId,
            $type,
            $cacheType
        ), Logger::DEBUG, Logger::CHANNEL_LINKER);

        if ($this->useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    unset($this->cache[$this->buildKey($endpointId, $type, $cacheType)]);
                    break;
                case self::CACHE_TYPE_HOST:
                    unset($this->cache[$this->buildKey($hostId, $type, $cacheType)]);
                    break;
            }
        }
    }

    /**
     * @param mixed $id
     * @param int $type
     * @param string $cacheType
     * @return string
     */
    protected function buildKey($id, int $type, string $cacheType): string
    {
        return sprintf('%s_%s_%s', $cacheType, $id, $type);
    }

    /**
     * @return array
     */
    public function getCache(): array
    {
        return $this->cache;
    }

    /**
     * @param mixed $endpointId
     * @return boolean
     */
    public function isValidEndpointId(?string $endpointId): bool
    {
        return !is_null($endpointId) && strlen(trim($endpointId)) > 0;
    }

    /**
     * @param mixed $hostId
     * @return boolean
     */
    public function isValidHostId(?int $hostId): bool
    {
        return !is_null($hostId) && $hostId > 0;
    }
}
