<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal 
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel as CoreModel;

/**
 * Entity data model
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 */
abstract class DataModel extends CoreModel
{
    const ACTION_COMPLETE = 'complete';
    const ACTION_INSERT = 'insert';
    const ACTION_UPDATE = 'update';
    const ACTION_DELETE = 'delete';

    /**
     * @type \jtl\Connector\Type\DataType
     */
    private $_type = null;

    /**
     * @type boolean
     */
    protected $isEncrypted = false;

    /**
     * @type array list of strings
     */
    protected $identities = array();

    /**
     * @type string
     */
    protected $action = '';

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return \jtl\Connector\Type\DataType 
     */
    public function getModelType()
    {
        if ($this->_type === null) {
            $reflect = new \ReflectionClass($this);
            $class = '\\jtl\\Connector\\Type\\' . $reflect->getShortName();

            $this->_type = new $class;
        }

        return $this->_type;
    }

    /**
     * Encrypted Status
     * 
     * @return boolean
     */
    public function isEncrypted()
    {
        return $this->isEncrypted;
    }

    /**
     * @param  string $action 
     * @return \jtl\Connector\Model\DataModel
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAction($action)
    {
        return $this->setProperty('action', $action, 'string');
    }

    /**
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Convert the Model into stdClass Object
     *
     * @param array $publics
     * @return stdClass $object
     */
    public function getPublic(array $publics = array('fields', 'isEncrypted', 'identities', 'action', '_type'))
    {
        $object = new \stdClass();

        $recursive = function (array $subElems, array $publics) use (&$recursive) {
            $arr = array();
            foreach ($subElems as $subElem) {
                if ($subElem instanceof DataModel) {
                    $arr[] = $subElem->getPublic($publics);
                } elseif ($subElem instanceof Identity) {
                    $arr[] = $subElem->toArray();
                } elseif ($subElem instanceof \DateTime) {
                    $arr[] = $subElem->format(\DateTime::ISO8601);
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

                if (!in_array($member, $publics)) {
                    if ($this->{$getter}() instanceof DataModel) {
                        $object->{$member} = $this->{$getter}()->getPublic($publics);
                    } elseif ($this->{$getter}() instanceof Identity) {
                        $object->{$member} = $this->{$getter}()->toArray();
                    } elseif ($this->{$getter}() instanceof \DateTime) {
                        $object->{$member} = $this->{$getter}()->format(\DateTime::ISO8601);
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
     * Sets Properties with matching Array Values
     *
     * @param object $object
     * @param array $options
     * @return jtl\Connector\Model\DataModel
     */
    public function setOptions($object = null, array $options = null)
    {
        parent::setOptions($object, $options);

        return $this;
    }

    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new \InvalidArgumentException(sprintf("%s: expected type '%s', given value '%s'.", $name, $type, gettype($value)));
        }

        $this->{$name} = $value;
        
        return $this;
    }

    protected function validateType($value, $type)
    {
        if ($value === null) {
            return true;
        }

        switch ($type)
        {
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
                return ($value instanceof \DateTime);
            default:
                throw new \InvalidArgumentException(sprintf("type '%s' validator not found", $type));
        }
    }
}
