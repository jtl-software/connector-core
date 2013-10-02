<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

use \jtl\Core\ModelContainer\IModelContainer;
use \jtl\Core\Exception\DatabaseException;

/**
 * Core Container Class
 */
abstract class CoreContainer implements IModelContainer
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelContainer\IModelContainer::add()
     */
    public function add($type, $object, $useValidation = true)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $modelclass = $this->items[$type][0];
            $class = "\\jtl\\Connector\\Model\\{$modelclass}";
            if (class_exists($class)) {
                $model = new $class();
                $model->setOptions($object);
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

        return false;
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
     * Convert the Container and SubItems into stdClass Object
     *
     * @param array $excludes            
     * @return stdClass $object
     */
    public function getPublic(array $excludes = null, array $subExcludes = null)
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
                    if (is_array($this->$member)) {
                        $var = array();
                        foreach ($this->$member as $i => $model) {
                            $var[$i] = $model->getPublic($subExcludes);
                        }
                    }

                    $object->$memberpub = $var;
                }
            }
        }
        
        return $object;
    }
}
?>