<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Connector\Model;

/**
 * Customer Adapter Class
 * @access public
 */
class CustomerAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\customer
     */
    protected $_customer;
    
    /**
     * @var \jtl\Connector\Model\customerAttr
     */
    protected $_customerAttr;
        
    /**
     * @return \jtl\Connector\Model\customer
     */
    public function getCustomer()
    {
        return $this->_customer;
    }    
    /**
     * @return \jtl\Connector\Model\customerAttr
     */
    public function getCustomerAttr()
    {
        return $this->_customerAttr;
    }
    
    public $items = array(
        "customer" => "Customer",
        "customerattr" => "CustomerAttr"
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
                $model = new $type();
                $model->setOptions($object);
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