<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DataModel
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel as CoreModel;

/**
 * Entity data model
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DataModel
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
    public function getType()
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
     * Identity checker
     *
     * @param string $identity
     * @return boolean
     */
    public function isIdentity($identity)
    {
        return in_array($identity, $this->identities);
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
                } else if ($subElem instanceof Identity) {
                    $arr[] = $subElem->toArray();
                } else if (is_array($subElem)) {
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
                    } else if ($this->{$getter}() instanceof Identity) {
                        $object->{$member} = $this->{$getter}()->toArray();
                    } else if (is_array($this->{$member})) {
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
     * Try to convert identities into objects
     *
     * @return jtl\Connector\Model\DataModel
     */
    public function setIdentities()
    {
        foreach ($this->identities as $identity) {
            $this->{$identity} = Identity::convert($this->{$identity});
        }

        return $this;
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
        $this->setIdentities();

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
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
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
