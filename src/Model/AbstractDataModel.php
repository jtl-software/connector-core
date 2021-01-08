<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 */

namespace Jtl\Connector\Core\Model;

use DateTime;
use InvalidArgumentException;
use Jtl\Connector\Core\Exception\NotImplementedException;
use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Type\AbstractDataType;
use ReflectionClass;
use ReflectionException;
use stdClass;

/**
 * Entity data model
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
abstract class AbstractDataModel extends AbstractModel
{
    /**
     * @var AbstractDataType
     * @Serializer\Type("Jtl\Connector\Core\Type\AbstractDataType")
     * @Serializer\AccessType("reflection")
     * @Serializer\Exclude
     */
    private $modelType = null;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\AccessType("reflection")
     * @Serializer\Exclude
     */
    protected $isEncrypted = false;

    /**
     * @var array list of strings
     * @Serializer\Type("array<string, string>")
     * @Serializer\Exclude
     * @Serializer\ReadOnly
     */
    protected $fields = [];

    /**
     * Fields Getter
     *
     * @return mixed:string
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Get a Model Member Name
     *
     * @param boolean $toWawi
     * @param string $key
     * @return mixed:string|NULL
     */
    public function getField(bool $toWawi = false, string $key): ?string
    {
        if ($this->fields !== null && is_array($this->fields)) {
            $fields = $this->fields;
            if (!$toWawi) {
                $fields = array_flip($fields);
            }

            if (is_array($fields) && isset($fields[$key])) {
                return $fields[$key];
            }
        }

        return null;
    }

    /**
     * @return AbstractDataType
     * @throws ReflectionException
     */
    public function getModelType(): AbstractDataType
    {
        $coreModelNamespace = 'Jtl\\Connector\\Core\\Model';
        if ($this->modelType === null) {
            $reflect = new ReflectionClass($this);
            if ($reflect->getNamespaceName() !== $coreModelNamespace) {
                while ($reflect = $reflect->getParentClass()) {
                    if ($reflect->getNamespaceName() === $coreModelNamespace) {
                        break;
                    }
                }
            }

            $class = 'Jtl\\Connector\\Core\\Type\\' . $reflect->getShortName();
            $this->modelType = new $class;
        }

        return $this->modelType;
    }

    /**
     * Encrypted Status
     *
     * @return boolean
     */
    public function isEncrypted(): bool
    {
        return $this->isEncrypted;
    }

    /**
     * @param string $propertyName
     * @param string|null $endpoint
     * @param int|null $host
     * @return AbstractDataModel
     * @throws ReflectionException
     */
    public function setIdentity(string $propertyName, string $endpoint = null, int $host = null): AbstractDataModel
    {
        foreach ($this->getModelType()->getProperties() as $propertyInfo) {
            $property = ucfirst($propertyInfo->getName());
            $getter = 'get' . $property;

            if ($propertyInfo->isNavigation() && !is_null($this->{$getter}())) {
                if (is_array($this->{$getter}())) {
                    $list = $this->{$getter}();
                    foreach ($list as &$entity) {
                        if ($entity instanceof self) {
                            $entity->setIdentity($propertyName, $endpoint, $host);
                        } elseif ($entity instanceof Identity && $propertyName === $propertyInfo->getName()) {
                            if (!is_null($endpoint)) {
                                $entity->setEndpoint($endpoint);
                            }

                            if (!is_null($host)) {
                                $entity->setHost($host);
                            }
                        }
                    }
                } elseif ($this->{$getter}() instanceof self) {
                    /* @var self $entity */
                    $entity = $this->{$getter}();
                    $entity->setIdentity($propertyName, $endpoint, $host);
                }
            } elseif ($propertyInfo->isIdentity() && $propertyName === $propertyInfo->getName()) {
                /* @var Identity $identity */
                $identity = $this->{$getter}();

                if (!is_null($endpoint)) {
                    $identity->setEndpoint($endpoint);
                }

                if (!is_null($host)) {
                    $identity->setHost($host);
                }
            }
        }

        return $this;
    }

    protected function setProperty($name, $value, $type): AbstractDataModel
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf(
                "%s (%s): expected type '%s', given value '%s'.",
                $name,
                get_class($this),
                $type,
                gettype($value)
            ));
        }

        $this->{$name} = $value;

        return $this;
    }

    protected function validateType($value, $type): bool
    {
        if ($value === null) {
            return true;
        }

        switch ($type) {
            case 'boolean':
            case 'bool':
                return is_bool($value);
            case 'integer':
            case 'int':
                return is_integer($value);
            case 'float':
            case 'double':
                return (is_float($value) || is_integer($value) || is_double($value));
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            case 'Identity':
                return ($value instanceof Identity);
            case 'DateTime':
                return ($value instanceof DateTime);
            default:
                if (is_object($value)) {
                    return is_null($value) || is_subclass_of($value, 'Jtl\Connector\Core\Model\AbstractDataModel');
                }

                throw new InvalidArgumentException(sprintf("type '%s' validator not found", $type));
        }
    }


    /**
     * Object Mapping
     *
     * @param boolean $toWawi
     * @param mixed $obj Object to map
     * @throws NotImplementedException
     */
    public function map(bool $toWawi = false, \stdClass $obj = null)
    {
        throw new NotImplementedException;
    }
}
