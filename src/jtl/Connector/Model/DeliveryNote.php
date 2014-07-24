<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
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
    protected $_customerOrderId = null;

    /**
     * @type string 
     */
    protected $_cLieferscheinNr = '';

    /**
     * @type DateTime|null Creation date
     */
    protected $_created = null;

    /**
     * @type DateTime|null 
     */
    protected $_dGedruckt = null;

    /**
     * @type DateTime|null 
     */
    protected $_dMailVersand = null;

    /**
     * @type boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $_isFulfillment = false;

    /**
     * @type integer 
     */
    protected $_kBenutzer = 0;

    /**
     * @type integer|null 
     */
    protected $_kLieferantenBestellung = 0;

    /**
     * @type string Optional text note
     */
    protected $_note = '';

    /**
	 * Nav [DeliveryNote » One]
	 *
     * @type \jtl\Connector\Model\DeliveryNoteItem[]
     */
    protected $_items = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_customerOrderId',
	);

	/**
	 * @param  integer $kBenutzer 
	 * @return \jtl\Connector\Model\DeliveryNote
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKBenutzer($kBenutzer)
	{
		if (!is_integer($kBenutzer))
			throw new InvalidArgumentException('integer expected.');
		$this->_kBenutzer = $kBenutzer;
		return $this;
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
		if (!is_string($cLieferscheinNr))
			throw new InvalidArgumentException('string expected.');
		$this->_cLieferscheinNr = $cLieferscheinNr;
		return $this;
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
		if (!is_string($note))
			throw new InvalidArgumentException('string expected.');
		$this->_note = $note;
		return $this;
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
		
		$this->_dMailVersand = $dMailVersand;
		return $this;
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
		
		$this->_created = $created;
		return $this;
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
		
		$this->_dGedruckt = $dGedruckt;
		return $this;
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
		if (!is_integer($kLieferantenBestellung))
			throw new InvalidArgumentException('integer expected.');
		$this->_kLieferantenBestellung = $kLieferantenBestellung;
		return $this;
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
		
		$this->_customerOrderId = $customerOrderId;
		return $this;
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
		if (!is_bool($isFulfillment))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isFulfillment = $isFulfillment;
		return $this;
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

