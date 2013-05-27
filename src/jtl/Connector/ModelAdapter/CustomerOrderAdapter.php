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
 * CustomerOrder Adapter Class
 * @access public
 */
class CustomerOrderAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\customerOrder
     */
    protected $_customerOrder;
    
    /**
     * @var \jtl\Connector\Model\customerOrderAttr
     */
    protected $_customerOrderAttr;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPosition
     */
    protected $_customerOrderPosition;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPositionVariation
     */
    protected $_customerOrderPositionVariation;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPaymentInfo
     */
    protected $_customerOrderPaymentInfo;
    
    /**
     * @var \jtl\Connector\Model\customerOrderShippingAddress
     */
    protected $_customerOrderShippingAddress;
    
    /**
     * @var \jtl\Connector\Model\customerOrderBillingAddress
     */
    protected $_customerOrderBillingAddress;
        
    /**
     * @return \jtl\Connector\Model\customerOrder
     */
    public function getCustomerOrder()
    {
        return $this->_customerOrder;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderAttr
     */
    public function getCustomerOrderAttr()
    {
        return $this->_customerOrderAttr;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderPosition
     */
    public function getCustomerOrderPosition()
    {
        return $this->_customerOrderPosition;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderPositionVariation
     */
    public function getCustomerOrderPositionVariation()
    {
        return $this->_customerOrderPositionVariation;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderPaymentInfo
     */
    public function getCustomerOrderPaymentInfo()
    {
        return $this->_customerOrderPaymentInfo;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderShippingAddress
     */
    public function getCustomerOrderShippingAddress()
    {
        return $this->_customerOrderShippingAddress;
    }    
    /**
     * @return \jtl\Connector\Model\customerOrderBillingAddress
     */
    public function getCustomerOrderBillingAddress()
    {
        return $this->_customerOrderBillingAddress;
    }
    
    public $items = array(
        "customerorder" => "CustomerOrder",
        "customerorderattr" => "CustomerOrderAttr",
        "customerorderposition" => "CustomerOrderPosition",
        "customerorderpositionvariation" => "CustomerOrderPositionVariation",
        "customerorderpaymentinfo" => "CustomerOrderPaymentInfo",
        "customerordershippingaddress" => "CustomerOrderShippingAddress",
        "customerorderbillingaddress" => "CustomerOrderBillingAddress"
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