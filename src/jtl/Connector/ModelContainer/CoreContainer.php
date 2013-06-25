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
    public function add($type, $object)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $modelclass = $this->items[$type][0];
            $class = "\\jtl\\Connector\\Model\\{$modelclass}";
            if (class_exists($class)) {
                $model = new $class();
                $model->setOptions($object);
                $model->validate();
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
}
?>