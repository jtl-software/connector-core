<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Shipment Model with reference to a deliveryNote.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Shipment extends DataModel
{
    /**
     * @type Identity Reference to deliveryNote
     */
    protected $_deliveryNoteId = null;

    /**
     * @type string 
     */
    protected $_cFulfillmentCenter = '';

    /**
     * @type DateTime|null Creation date
     */
    protected $_created = null;

    /**
     * @type DateTime|null 
     */
    protected $_dAnkunftszeit = null;

    /**
     * @type DateTime|null 
     */
    protected $_dVersendet = null;

    /**
     * @type float|null 
     */
    protected $_fGewicht = 0.0;

    /**
     * @type string Unique shipment id
     */
    protected $_identCode = '';

    /**
     * @type integer 
     */
    protected $_kBenutzer = 0;

    /**
     * @type integer|null 
     */
    protected $_kLogistik = 0;

    /**
     * @type integer|null 
     */
    protected $_kVersandArt = 0;

    /**
     * @type string 
     */
    protected $_logistic = '';

    /**
     * @type string Optional shipment note
     */
    protected $_note = '';

    /**
     * @type integer|null 
     */
    protected $_nVerpackZeitSek = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_deliveryNoteId',
	);

	/**
	 * @param  integer $kBenutzer 
	 * @return \jtl\Connector\Model\Shipment
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
	 * @param  integer $kLogistik 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKLogistik($kLogistik)
	{
		if (!is_integer($kLogistik))
			throw new InvalidArgumentException('integer expected.');
		$this->_kLogistik = $kLogistik;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKLogistik()
	{
		return $this->_kLogistik;
	}

	/**
	 * @param  string $identCode Unique shipment id
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setIdentCode($identCode)
	{
		if (!is_string($identCode))
			throw new InvalidArgumentException('string expected.');
		$this->_identCode = $identCode;
		return $this;
	}
	
	/**
	 * @return string Unique shipment id
	 */
	public function getIdentCode()
	{
		return $this->_identCode;
	}

	/**
	 * @param  DateTime $created Creation date
	 * @return \jtl\Connector\Model\Shipment
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
	 * @param  string $note Optional shipment note
	 * @return \jtl\Connector\Model\Shipment
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
	 * @return string Optional shipment note
	 */
	public function getNote()
	{
		return $this->_note;
	}

	/**
	 * @param  float $fGewicht 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setFGewicht($fGewicht)
	{
		if (!is_float($fGewicht))
			throw new InvalidArgumentException('float expected.');
		$this->_fGewicht = $fGewicht;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getFGewicht()
	{
		return $this->_fGewicht;
	}

	/**
	 * @param  integer $kVersandArt 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKVersandArt($kVersandArt)
	{
		if (!is_integer($kVersandArt))
			throw new InvalidArgumentException('integer expected.');
		$this->_kVersandArt = $kVersandArt;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKVersandArt()
	{
		return $this->_kVersandArt;
	}

	/**
	 * @param  string $logistic 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setLogistic($logistic)
	{
		if (!is_string($logistic))
			throw new InvalidArgumentException('string expected.');
		$this->_logistic = $logistic;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getLogistic()
	{
		return $this->_logistic;
	}

	/**
	 * @param  string $cFulfillmentCenter 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCFulfillmentCenter($cFulfillmentCenter)
	{
		if (!is_string($cFulfillmentCenter))
			throw new InvalidArgumentException('string expected.');
		$this->_cFulfillmentCenter = $cFulfillmentCenter;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCFulfillmentCenter()
	{
		return $this->_cFulfillmentCenter;
	}

	/**
	 * @param  DateTime $dAnkunftszeit 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setDAnkunftszeit(DateTime $dAnkunftszeit)
	{
		
		$this->_dAnkunftszeit = $dAnkunftszeit;
		return $this;
	}
	
	/**
	 * @return DateTime 
	 */
	public function getDAnkunftszeit()
	{
		return $this->_dAnkunftszeit;
	}

	/**
	 * @param  integer $nVerpackZeitSek 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setNVerpackZeitSek($nVerpackZeitSek)
	{
		if (!is_integer($nVerpackZeitSek))
			throw new InvalidArgumentException('integer expected.');
		$this->_nVerpackZeitSek = $nVerpackZeitSek;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getNVerpackZeitSek()
	{
		return $this->_nVerpackZeitSek;
	}

	/**
	 * @param  DateTime $dVersendet 
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setDVersendet(DateTime $dVersendet)
	{
		
		$this->_dVersendet = $dVersendet;
		return $this;
	}
	
	/**
	 * @return DateTime 
	 */
	public function getDVersendet()
	{
		return $this->_dVersendet;
	}

	/**
	 * @param  Identity $deliveryNoteId Reference to deliveryNote
	 * @return \jtl\Connector\Model\Shipment
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setDeliveryNoteId(Identity $deliveryNoteId)
	{
		
		$this->_deliveryNoteId = $deliveryNoteId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to deliveryNote
	 */
	public function getDeliveryNoteId()
	{
		return $this->_deliveryNoteId;
	}
}

