<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Shipment Model with reference to a deliveryNote.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Shipment extends DataModel
{
    /**
     * @type Identity Reference to deliveryNote
     */
    protected $deliveryNoteId = null;

    /**
     * @type string 
     */
    protected $cFulfillmentCenter = '';

    /**
     * @type DateTime|null Creation date
     */
    protected $created = null;

    /**
     * @type DateTime|null 
     */
    protected $dAnkunftszeit = null;

    /**
     * @type DateTime|null 
     */
    protected $dVersendet = null;

    /**
     * @type float|null 
     */
    protected $fGewicht = 0.0;

    /**
     * @type string Unique shipment id
     */
    protected $identCode = '';

    /**
     * @type integer 
     */
    protected $kBenutzer = 0;

    /**
     * @type integer|null 
     */
    protected $kLogistik = 0;

    /**
     * @type integer|null 
     */
    protected $kVersandArt = 0;

    /**
     * @type string 
     */
    protected $logistic = '';

    /**
     * @type string Optional shipment note
     */
    protected $note = '';

    /**
     * @type integer|null 
     */
    protected $nVerpackZeitSek = 0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'deliveryNoteId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  integer $kBenutzer 
     * @return \jtl\Connector\Model\Shipment
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
     * @param  integer $kLogistik 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKLogistik($kLogistik)
    {
        return $this->setProperty('kLogistik', $kLogistik, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKLogistik()
    {
        return $this->kLogistik;
    }

    /**
     * @param  string $identCode Unique shipment id
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIdentCode($identCode)
    {
        return $this->setProperty('identCode', $identCode, 'string');
    }
    
    /**
     * @return string Unique shipment id
     */
    public function getIdentCode()
    {
        return $this->identCode;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Shipment
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
     * @param  string $note Optional shipment note
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }
    
    /**
     * @return string Optional shipment note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  float $fGewicht 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFGewicht($fGewicht)
    {
        return $this->setProperty('fGewicht', $fGewicht, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFGewicht()
    {
        return $this->fGewicht;
    }

    /**
     * @param  integer $kVersandArt 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKVersandArt($kVersandArt)
    {
        return $this->setProperty('kVersandArt', $kVersandArt, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKVersandArt()
    {
        return $this->kVersandArt;
    }

    /**
     * @param  string $logistic 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLogistic($logistic)
    {
        return $this->setProperty('logistic', $logistic, 'string');
    }
    
    /**
     * @return string 
     */
    public function getLogistic()
    {
        return $this->logistic;
    }

    /**
     * @param  string $cFulfillmentCenter 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCFulfillmentCenter($cFulfillmentCenter)
    {
        return $this->setProperty('cFulfillmentCenter', $cFulfillmentCenter, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCFulfillmentCenter()
    {
        return $this->cFulfillmentCenter;
    }

    /**
     * @param  DateTime $dAnkunftszeit 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDAnkunftszeit(DateTime $dAnkunftszeit)
    {
        return $this->setProperty('dAnkunftszeit', $dAnkunftszeit, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDAnkunftszeit()
    {
        return $this->dAnkunftszeit;
    }

    /**
     * @param  integer $nVerpackZeitSek 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNVerpackZeitSek($nVerpackZeitSek)
    {
        return $this->setProperty('nVerpackZeitSek', $nVerpackZeitSek, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNVerpackZeitSek()
    {
        return $this->nVerpackZeitSek;
    }

    /**
     * @param  DateTime $dVersendet 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDVersendet(DateTime $dVersendet)
    {
        return $this->setProperty('dVersendet', $dVersendet, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDVersendet()
    {
        return $this->dVersendet;
    }

    /**
     * @param  Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        return $this->setProperty('deliveryNoteId', $deliveryNoteId, 'Identity');
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->deliveryNoteId;
    }
}

