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
 * DeliveryNote Adapter Class
 * @access public
 */
class DeliveryNoteAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\deliveryNote
     */
    protected $_deliveryNote;
    
    /**
     * @var \jtl\Connector\Model\deliveryNotePos
     */
    protected $_deliveryNotePos;
    
    /**
     * @var \jtl\Connector\Model\shipment
     */
    protected $_shipment;
        
    /**
     * @return \jtl\Connector\Model\deliveryNote
     */
    public function getDeliveryNote()
    {
        return $this->_deliveryNote;
    }    
    /**
     * @return \jtl\Connector\Model\deliveryNotePos
     */
    public function getDeliveryNotePos()
    {
        return $this->_deliveryNotePos;
    }    
    /**
     * @return \jtl\Connector\Model\shipment
     */
    public function getShipment()
    {
        return $this->_shipment;
    }
    
    public $items = array(
        "deliverynote" => "DeliveryNote",
        "deliverynotepos" => "DeliveryNotePos",
        "shipment" => "Shipment"
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