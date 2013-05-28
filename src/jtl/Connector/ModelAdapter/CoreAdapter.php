<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Core\Exception\DatabaseException;

/**
 * Core Adapter Class
 */
abstract class CoreAdapter implements IModelAdapter
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::add()
     */
    public function add($type, $object)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $type = $this->items[$type];
            $class = "\\jtl\\Connector\\Model\\{$type}";
            if (class_exists($class)) {
                $model = new $class();
                $model->setOptions($object);
                $model->validate();
                $setter = "_" . lcfirst($type);
    
                $this->$setter = $model;
    
                return true;
            }
        }
    
        return false;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::insert()
     */
    public function insert()
    {
        foreach ($this->items as $item) {
            $getter = "_" . lcfirst($item);
            $mapper = "{$item}Mapper";
            $mapper = $mapper::getInstance();
            $result = $mapper->deleteSave($this->$getter);
    
            if ($result->getErrno() > 0) {
                throw new DatabaseException($result->getError(), $result->getErrno());
            }
        }
    
        return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::isComplete()
     */
    public function isComplete()
    {
        $complete = true;
        foreach ($this->items as $item) {
            $getter = "_" . lcfirst($item);
            if ($this->$getter === null) {
                $complete = false;
                break;
            }
        }
    
        return $complete;
    }
}
?>