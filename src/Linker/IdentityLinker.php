<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */
namespace Jtl\Connector\Core\Linker;

use Jtl\Connector\Core\Definition\Model;
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
     * @param bool $isDeleted
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
                        } elseif ($entity instanceof Identity && Model::isIdentityProperty($reflect->getShortName(), $property)) {
                            $this->linkIdentityList($entity, $reflect->getShortName(), $property, $isDeleted);
                        } else {
                            Logger::write(
                                sprintf('Property (%s) from model (%s) is not an instance of DataModel or Identity', $propertyInfo->getName(), $reflect->getShortName()),
                                Logger::WARNING,
                                'linker'
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
                        'linker'
                    );
                }
            } elseif ($propertyInfo->isIdentity() && Model::isIdentityProperty($reflect->getShortName(), $property)) {
                $identity = $model->{$getter}();

                if (!($identity instanceof Identity)) {
                    continue;
                }

                if (strlen($identity->getEndpoint()) > 0 && $identity->getHost() > 0) {
                    if ($isDeleted) {
                        $this->delete($reflect->getShortName(), $identity->getEndpoint(), $identity->getHost());
                    } elseif (!$this->exists($reflect->getShortName(), $property, null, $identity->getHost(), true)) {
                        $this->save($identity->getEndpoint(), $identity->getHost(), $reflect->getShortName(), $property);
                    }

                    continue;
                } else {
                    if ($identity->getHost() > 0) {
                        if ($isDeleted) {
                            $this->delete($reflect->getShortName(), null, $identity->getHost());
                        } elseif ($this->exists($reflect->getShortName(), $property, null, $identity->getHost())) {
                            $identity->setEndpoint($this->getEndpointId($reflect->getShortName(), $property, $identity->getHost()));

                            $model->{$setter}($identity);
                        }
                    } elseif (strlen($identity->getEndpoint()) > 0) {
                        if ($isDeleted) {
                            $this->delete($reflect->getShortName(), $identity->getEndpoint(), null);
                        } elseif ($this->exists($reflect->getShortName(), $property, $identity->getEndpoint(), null)) {
                            $identity->setHost($this->getHostId($reflect->getShortName(), $property, $identity->getEndpoint()));

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
     * @throws LinkerException
     */
    public function linkIdentityList(Identity $identity, string $modelName, string $property, bool $isDeleted = false): void
    {
        if (strlen($identity->getEndpoint()) > 0 && $identity->getHost() > 0) {
            if ($isDeleted) {
                $this->delete($modelName, $identity->getEndpoint(), $identity->getHost());
            } elseif (!$this->exists($modelName, $property, null, $identity->getHost(), true)) {
                $this->save($identity->getEndpoint(), $identity->getHost(), $modelName, $property);
            }
        } else {
            if ($identity->getHost() > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, null, $identity->getHost());
                } elseif ($this->exists($modelName, $property, null, $identity->getHost())) {
                    $identity->setEndpoint($this->getEndpointId($modelName, $property, $identity->getHost()));
                }
            } elseif (strlen($identity->getEndpoint()) > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, $identity->getEndpoint(), null);
                } elseif ($this->exists($modelName, $property, $identity->getEndpoint(), null)) {
                    $identity->setHost($this->getHostId($modelName, $property, $identity->getEndpoint()));
                }
            }
        }
    }

    /**
     * Checks if link exists
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param string $modelName
     * @param string $property
     * @param boolean $validate
     * @return boolean
     * @throws LinkerException
     */
    public function exists(string $modelName, string $property, string $endpointId = null, int $hostId = null, bool $validate = false): bool
    {
        if (!$this->isValidEndpointId($endpointId) && !$this->isValidHostId($hostId)) {
            throw new LinkerException(sprintf(
                'Both parameters (endpointId = %s, hostId = %s, modelName: %s, property: %s) are invalid.',
                $endpointId,
                $hostId,
                $modelName,
                $property
            ));
        }

        $type = Model::getPropertyIdentityType($modelName, $property);

        $id = null;
        $cacheType = null;
        if ($this->isValidEndpointId($endpointId)) {
            $id = $endpointId;
            $cacheType = self::CACHE_TYPE_ENDPOINT;
        } elseif ($this->isValidHostId($hostId)) {
            $id = $hostId;
            $cacheType = self::CACHE_TYPE_HOST;
        }

        if ($this->checkCache($id, $type, $cacheType, $validate)) {
            return true;
        }

        if ($this->isValidEndpointId($endpointId)) {
            $hostId = $this->mapper->getHostId($type, $endpointId);
        } elseif ($this->isValidHostId($hostId)) {
            $endpointId = $this->mapper->getEndpointId($type, $hostId);
        }

        if ($validate && !$this->isValidEndpointId($endpointId)) {
            return false;
        }

        $this->saveCache($endpointId, $hostId, $type, $cacheType);

        return true;
    }

    /**
     * @param string $endpointId
     * @param int $hostId
     * @param string $modelName
     * @param string|null $property
     * @return bool
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
     * @param int|null $hostId
     * @return boolean
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
     * @param int $hostId
     * @return string
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
     * @return bool|int|mixed
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
     * @param int $type
     * @param string $cacheType
     * @param bool $validate
     * @return bool
     */
    protected function checkCache($id, int $type, string $cacheType, bool $validate = false): bool
    {
        $result = $this->useCache && array_key_exists($this->buildKey($id, $type, $cacheType), $this->cache);

        if ($validate && $result) {
            $data = $this->cache[$this->buildKey($id, $type, $cacheType)];
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    $result = $this->isValidHostId($data);
                    break;
                case self::CACHE_TYPE_HOST:
                    $result = $this->isValidEndpointId($data);
                    break;
            }
        }

        // Debug
        Logger::write(sprintf(
            'Checkcache (id: %s, type: %s, cacheType: %s) with result %s',
            $id,
            $type,
            $cacheType,
            $result ? 'true' : 'false'
        ), Logger::DEBUG, 'linker');

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
        ), Logger::DEBUG, 'linker');

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
        ), Logger::DEBUG, 'linker');

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
        ), Logger::DEBUG, 'linker');

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
