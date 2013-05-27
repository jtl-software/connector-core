<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Connector\Model;
use \jtl\Core\Exception\DatabaseException;

/**
 * Category Adapter Class
 * @access public
 */
class CategoryAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\category
     */
    protected $_category;
    
    /**
     * @var \jtl\Connector\Model\categoryI18n
     */
    protected $_categoryI18n;
    
    /**
     * @var \jtl\Connector\Model\categoryAttr
     */
    protected $_categoryAttr;
    
    /**
     * @var \jtl\Connector\Model\categoryVisibility
     */
    protected $_categoryVisibility;
    
    /**
     * @var \jtl\Connector\Model\categoryCustomerGroup
     */
    protected $_categoryCustomerGroup;
        
    /**
     * @return \jtl\Connector\Model\category
     */
    public function getCategory()
    {
        return $this->_category;
    }    
    /**
     * @return \jtl\Connector\Model\categoryI18n
     */
    public function getCategoryI18n()
    {
        return $this->_categoryI18n;
    }    
    /**
     * @return \jtl\Connector\Model\categoryAttr
     */
    public function getCategoryAttr()
    {
        return $this->_categoryAttr;
    }    
    /**
     * @return \jtl\Connector\Model\categoryVisibility
     */
    public function getCategoryVisibility()
    {
        return $this->_categoryVisibility;
    }    
    /**
     * @return \jtl\Connector\Model\categoryCustomerGroup
     */
    public function getCategoryCustomerGroup()
    {
        return $this->_categoryCustomerGroup;
    }
    
    public $items = array(
        "category" => "Category",
        "categoryi18n" => "CategoryI18n",
        "categoryattr" => "CategoryAttr",
        "categoryvisibility" => "CategoryVisibility",
        "categorycustomergroup" => "CategoryCustomerGroup"
    );
    
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