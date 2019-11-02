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
use Jtl\Connector\Core\Model\Model;
use Jtl\Connector\Core\Type\DataType;
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
abstract class DataModel extends Model
{
    /**
     * @var DataType
     * @Serializer\Type("Jtl\Connector\Core\Type\DataType")
     * @Serializer\AccessType("reflection")
     * @Serializer\Exclude
     */
    private $_type = null;
    
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
     * @return DataType
     * @throws ReflectionException
     */
    public function getModelType(): DataType
    {
        if ($this->_type === null) {
            $reflect = new ReflectionClass($this);
            $class = '\\Jtl\\Connector\\Core\\Type\\' . $reflect->getShortName();
            
            $this->_type = new $class;
        }
        
        return $this->_type;
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
     * Convert the Model into stdClass Object
     *
     * @param array $publics
     * @return stdClass $object
     */
    public function getPublic(array $publics = ['fields', 'isEncrypted', 'identities', '_type']): stdClass
    {
        $object = new stdClass();
        
        $recursive = function (array $subElems, array $publics) use (&$recursive) {
            $arr = [];
            foreach ($subElems as $subElem) {
                if ($subElem instanceof DataModel) {
                    $arr[] = $subElem->getPublic($publics);
                } elseif ($subElem instanceof Identity) {
                    $arr[] = $subElem->toArray();
                } elseif ($subElem instanceof DateTime) {
                    $arr[] = $subElem->format(DateTime::ISO8601);
                } elseif (is_array($subElem)) {
                    $arr[] = $recursive($subElem, $publics);
                } else {
                    $arr[] = $subElem;
                }
            }
            
            return $arr;
        };
        
        $members = array_keys(get_object_vars($this));
        if (is_array($members) && count($members) > 0) {
            foreach ($members as $member) {
                $property = ucfirst($member);
                $getter = 'get' . $property;
                
                if (!in_array($member, $publics, true)) {
                    if ($this->{$getter}() instanceof DataModel) {
                        $object->{$member} = $this->{$getter}()->getPublic($publics);
                    } elseif ($this->{$getter}() instanceof Identity) {
                        $object->{$member} = $this->{$getter}()->toArray();
                    } elseif ($this->{$getter}() instanceof DateTime) {
                        $object->{$member} = $this->{$getter}()->format(DateTime::ISO8601);
                    } elseif (is_array($this->{$member})) {
                        $object->{$member} = $recursive($this->{$member}, $publics);
                    } else {
                        $object->{$member} = $this->{$member};
                    }
                }
            }
        }
        
        return $object;
    }
    
    /**
     * @param string $propertyName
     * @param string|null $endpoint
     * @param int|null $host
     * @return DataModel
     * @throws ReflectionException
     */
    public function setIdentity(string $propertyName, string $endpoint = null, int $host = null): DataModel
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
    }
    
    protected function setProperty($name, $value, $type): DataModel
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
    
    protected function validateType($value, $type)
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
                    return is_null($value) || is_subclass_of($value, 'Jtl\Connector\Core\Model\DataModel');
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
