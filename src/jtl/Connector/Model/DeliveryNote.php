<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * A delivery note created for shipment..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class DeliveryNote extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    public $_customerOrderId = null;

    /**
     * @type string 
     */
    public $_cLieferscheinNr = '';

    /**
     * @type DateTime|null Creation date
     */
    public $_created = null;

    /**
     * @type DateTime|null 
     */
    public $_dGedruckt = null;

    /**
     * @type DateTime|null 
     */
    public $_dMailVersand = null;

    /**
     * @type boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public $_isFulfillment = false;

    /**
     * @type integer 
     */
    public $_kBenutzer = 0;

    /**
     * @type integer|null 
     */
    public $_kLieferantenBestellung = 0;

    /**
     * @type string Optional text note
     */
    public $_note = '';

    /**
     * Nav [DeliveryNote » One]
     *
     * @type \jtl\Connector\Model\DeliveryNoteItem[]
     */
    public $_items = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_customerOrderId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_items' => '\jtl\Connector\Model\DeliveryNoteItem',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  integer $kBenutzer 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKBenutzer($kBenutzer)
    {
        return $this->setProperty('_kBenutzer', $kBenutzer, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKBenutzer()
    {
        return $this->_kBenutzer;
    }

    /**
     * @param  string $cLieferscheinNr 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLieferscheinNr($cLieferscheinNr)
    {
        return $this->setProperty('_cLieferscheinNr', $cLieferscheinNr, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLieferscheinNr()
    {
        return $this->_cLieferscheinNr;
    }

    /**
     * @param  string $note Optional text note
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('_note', $note, 'string');
    }
    
    /**
     * @return string Optional text note
     */
    public function getNote()
    {
        return $this->_note;
    }

    /**
     * @param  DateTime $dMailVersand 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDMailVersand(DateTime $dMailVersand)
    {
        return $this->setProperty('_dMailVersand', $dMailVersand, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDMailVersand()
    {
        return $this->_dMailVersand;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('_created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param  DateTime $dGedruckt 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDGedruckt(DateTime $dGedruckt)
    {
        return $this->setProperty('_dGedruckt', $dGedruckt, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDGedruckt()
    {
        return $this->_dGedruckt;
    }

    /**
     * @param  integer $kLieferantenBestellung 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKLieferantenBestellung($kLieferantenBestellung)
    {
        return $this->setProperty('_kLieferantenBestellung', $kLieferantenBestellung, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKLieferantenBestellung()
    {
        return $this->_kLieferantenBestellung;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('_customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }

    /**
     * @param  boolean $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsFulfillment($isFulfillment)
    {
        return $this->setProperty('_isFulfillment', $isFulfillment, 'boolean');
    }
    
    /**
     * @return boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment()
    {
        return $this->_isFulfillment;
    }

    /**
     * @param  \jtl\Connector\Model\DeliveryNoteItem $item
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function addItem(\jtl\Connector\Model\DeliveryNoteItem $item)
    {
        $this->_items[] = $item;
        return $this;
    }
    
    /**
     * @return DeliveryNoteItem
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function clearItems()
    {
        $this->_items = array();
        return $this;
    }
}

