<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

use \jtl\Core\ModelContainer\IModelContainer;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Core\Exception\ContainerException;
use \jtl\Core\Model\DataModel;
use \jtl\Connector\Model\Identity;

/**
 * Core Container Class
 */
abstract class CoreContainer implements IModelContainer
{
    /**
     * Construct
     */
    public function __construct()
    {
        $members = array_keys(get_object_vars($this));
        foreach ($members as $member) {
            if ($this->{$member} === null) {
                $this->{$member} = array();
            }
        }
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelContainer\IModelContainer::add()
     */
    public function add($type, $object, $useValidation = true, $modelNamespace = null)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            if (is_subclass_of($object, '\jtl\Core\Model\DataModel')) {
                $model = $object;
            }
            else {
                $modelclass = $this->items[$type][0];
                $namespace = $modelNamespace !== null ? $modelNamespace : "\\jtl\\Connector\\Model";
                $class = "{$namespace}\\{$modelclass}";
                if (class_exists($class)) {
                    $model = new $class();
                    $model->setOptions($object);
                }
            }

            if ($useValidation) {
                $model->validate();
            }

            $setter = "_" . lcfirst($this->items[$type][1]);
        
            if ($this->$setter === null) {
                $this->$setter = array();
            }

            array_push($this->$setter, $model);
        
            return true;
        }
    
        return false;
    }

    /**
     * 
     * @param string $type
     * @param \jtl\Connector\Model\Identity $identity
     * @return boolean
     */
    public function addIdentity($type, Identity $itentity)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $setter = "_" . lcfirst($this->items[$type][1]);

            if ($this->$setter === null) {
                $this->$setter = array();
            }

            $count = array_push($this->$setter, $itentity);

            return ($count > 0);
        }

        return false;
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelContainer\IModelContainer::get()
     */
    public function get($type)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $getter = "_" . lcfirst($this->items[$type][1]);

            return $this->$getter;
        }

        throw new ContainerException("Type '{$type}' does not exists");
    }

    /**
     * Updates every object from type $type with given property values
     *
     * @param string $type
     * @param multiple: mixed
     * @return bool
     */
    public function update($type, array $kvs)
    {
        $type = strtolower($type);
        if (isset($this->items[$type]) && $kvs !== null && count($kvs) > 0) {
            $getter = "_" . lcfirst($this->items[$type][1]);

            $objs = $this->$getter;
            if ($objs !== null) {
                foreach ($objs as $obj) {
                    foreach ($kvs as $key => $value) {
                        $obj->$key = $value;
                    }
                }

                return true;
            }
        }

        return false;
    }

    /**
     * Try to find an object and replace it
     * If an object was not found, it will be added, if the add parameter is true
     *
     * @param string $type
     * @param multiple: mixed
     * @param \jtl\Core\Model\DataModel $object
     * @param bool $add
     * @param bool $useValidation
     * @return bool
     */
    public function updateOne($type, array $kvs, DataModel $object, $add = false, $useValidation = true)
    {
        $type = strtolower($type);
        if (isset($this->items[$type]) && $kvs !== null && count($kvs) > 0) {
            $getter = "_" . lcfirst($this->items[$type][1]);

            $objs = $this->$getter;
            if ($objs !== null) {
                foreach ($objs as $i => $obj) {
                    $matched = true;
                    foreach ($kvs as $key => $value) {
                        if (!isset($obj->$key) || $obj->$key != $value) {
                            $matched = false;
                            break;
                        }
                    }

                    if ($matched) {
                        $this->{$getter}[$i] = $object;

                        return true;
                    }
                }

                if ($add) {
                    if ($useValidation) {
                        $object->validate();
                    }

                    $this->{$getter}[] = $object;
                }
            }
        }

        return false;
    }

    /**
     * Convert the Container and SubItems into stdClass Object
     *
     * @param array $excludes            
     * @return stdClass $object
     */
    public function getPublic(array $excludes = array('items'), array $subExcludes = null)
    {
        $object = new \stdClass();
        
        $members = array_keys(get_object_vars($this));
        if (is_array($members) && count($members) > 0) {
            if ($excludes === null)
                $excludes = array();
            
            foreach ($members as $member) {
                if (!in_array($member, $excludes)) {
                    $memberpub = $member;
                    if ($member[0] == "_")
                        $memberpub = substr($member, 1);

                    $var = $this->$member;
                    if (is_array($this->$member) && count($this->$member) > 0) {
                        $var = array();
                        foreach ($this->$member as $i => $model) {
                            $var[$i] = ($subExcludes !== null) ? $model->getPublic($subExcludes) : $model->getPublic();
                        }

                        $object->$memberpub = $var;
                    }
                }
            }
        }
        
        return $object;
    }

    /**
     * @return \jtl\Connector\Model\DataModel
     * @throws \jtl\Core\Exception\ContainerException
     */
    abstract public function getMainModel();
}
?>