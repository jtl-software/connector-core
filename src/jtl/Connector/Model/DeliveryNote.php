<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * A delivery note created for shipment..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class DeliveryNote extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @type string 
     */
    protected $cLieferscheinNr = '';

    /**
     * @type DateTime|null Creation date
     */
    protected $created = null;

    /**
     * @type DateTime|null 
     */
    protected $dGedruckt = null;

    /**
     * @type DateTime|null 
     */
    protected $dMailVersand = null;

    /**
     * @type boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $isFulfillment = false;

    /**
     * @type integer 
     */
    protected $kBenutzer = 0;

    /**
     * @type integer|null 
     */
    protected $kLieferantenBestellung = 0;

    /**
     * @type string Optional text note
     */
    protected $note = '';

    /**
     * Nav [DeliveryNote » One]
     *
     * @type \jtl\Connector\Model\DeliveryNoteItem[]
     */
    protected $items = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'customerOrderId',
    );

    /**
     * @param  integer $kBenutzer 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKBenutzer($kBenutzer)
    {
        return $this->setProperty('kBenutzer', $kBenutzer, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKBenutzer()
    {
        return $this->kBenutzer;
    }

    /**
     * @param  string $cLieferscheinNr 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLieferscheinNr($cLieferscheinNr)
    {
        return $this->setProperty('cLieferscheinNr', $cLieferscheinNr, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLieferscheinNr()
    {
        return $this->cLieferscheinNr;
    }

    /**
     * @param  string $note Optional text note
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }
    
    /**
     * @return string Optional text note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  DateTime $dMailVersand 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDMailVersand(DateTime $dMailVersand)
    {
        return $this->setProperty('dMailVersand', $dMailVersand, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDMailVersand()
    {
        return $this->dMailVersand;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  DateTime $dGedruckt 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDGedruckt(DateTime $dGedruckt)
    {
        return $this->setProperty('dGedruckt', $dGedruckt, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDGedruckt()
    {
        return $this->dGedruckt;
    }

    /**
     * @param  integer $kLieferantenBestellung 
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKLieferantenBestellung($kLieferantenBestellung)
    {
        return $this->setProperty('kLieferantenBestellung', $kLieferantenBestellung, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKLieferantenBestellung()
    {
        return $this->kLieferantenBestellung;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  boolean $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsFulfillment($isFulfillment)
    {
        return $this->setProperty('isFulfillment', $isFulfillment, 'boolean');
    }
    
    /**
     * @return boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment()
    {
        return $this->isFulfillment;
    }

    /**
     * @param  \jtl\Connector\Model\DeliveryNoteItem $item
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function addItem(\jtl\Connector\Model\DeliveryNoteItem $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    /**
     * @return DeliveryNoteItem
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function clearItems()
    {
        $this->items = array();
        return $this;
    }
}

