<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
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
    public $_deliveryNoteId = null;

    /**
     * @type string 
     */
    public $_cFulfillmentCenter = '';

    /**
     * @type DateTime|null Creation date
     */
    public $_created = null;

    /**
     * @type DateTime|null 
     */
    public $_dAnkunftszeit = null;

    /**
     * @type DateTime|null 
     */
    public $_dVersendet = null;

    /**
     * @type float|null 
     */
    public $_fGewicht = 0.0;

    /**
     * @type string Unique shipment id
     */
    public $_identCode = '';

    /**
     * @type integer 
     */
    public $_kBenutzer = 0;

    /**
     * @type integer|null 
     */
    public $_kLogistik = 0;

    /**
     * @type integer|null 
     */
    public $_kVersandArt = 0;

    /**
     * @type string 
     */
    public $_logistic = '';

    /**
     * @type string Optional shipment note
     */
    public $_note = '';

    /**
     * @type integer|null 
     */
    public $_nVerpackZeitSek = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_deliveryNoteId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
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
     * @return \jtl\Connector\Model\Shipment
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
     * @param  integer $kLogistik 
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKLogistik($kLogistik)
    {
        return $this->setProperty('_kLogistik', $kLogistik, 'integer');
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
        return $this->setProperty('_identCode', $identCode, 'string');
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
     * @param  string $note Optional shipment note
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('_note', $note, 'string');
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
        return $this->setProperty('_fGewicht', $fGewicht, 'float');
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
        return $this->setProperty('_kVersandArt', $kVersandArt, 'integer');
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
        return $this->setProperty('_logistic', $logistic, 'string');
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
        return $this->setProperty('_cFulfillmentCenter', $cFulfillmentCenter, 'string');
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
        return $this->setProperty('_dAnkunftszeit', $dAnkunftszeit, 'DateTime');
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
        return $this->setProperty('_nVerpackZeitSek', $nVerpackZeitSek, 'integer');
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
        return $this->setProperty('_dVersendet', $dVersendet, 'DateTime');
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
        return $this->setProperty('_deliveryNoteId', $deliveryNoteId, 'Identity');
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->_deliveryNoteId;
    }
}

