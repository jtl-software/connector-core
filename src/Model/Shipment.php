<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shipment Model with reference to a deliveryNote
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Shipment extends DataModel
{
    /**
     * @var Identity Reference to deliveryNote
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("deliveryNoteId")
     * @Serializer\Accessor(getter="getDeliveryNoteId",setter="setDeliveryNoteId")
     */
    protected $deliveryNoteId = null;
    
    /**
     * @var Identity Unique shipment id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Carrier name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("carrierName")
     * @Serializer\Accessor(getter="getCarrierName",setter="setCarrierName")
     */
    protected $carrierName = '';
    
    /**
     * @var DateTime Creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string Optional Identcode
     * @Serializer\Type("string")
     * @Serializer\SerializedName("identCode")
     * @Serializer\Accessor(getter="getIdentCode",setter="setIdentCode")
     */
    protected $identCode = '';
    
    /**
     * @var string Optional shipment note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("trackingUrl")
     * @Serializer\Accessor(getter="getTrackingUrl",setter="setTrackingUrl")
     */
    protected $trackingUrl = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->deliveryNoteId = new Identity();
    }
    
    /**
     * @param Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        $this->deliveryNoteId = $deliveryNoteId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->deliveryNoteId;
    }
    
    /**
     * @param Identity $id Unique shipment id
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique shipment id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $carrierName Carrier name
     * @return \jtl\Connector\Model\Shipment
     */
    public function setCarrierName($carrierName)
    {
        $this->carrierName = $carrierName;
        
        return $this;
    }
    
    /**
     * @return string Carrier name
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }
    
    /**
     * @param DateTime $creationDate Creation date
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $identCode Optional Identcode
     * @return \jtl\Connector\Model\Shipment
     */
    public function setIdentCode($identCode)
    {
        $this->identCode = $identCode;
        
        return $this;
    }
    
    /**
     * @return string Optional Identcode
     */
    public function getIdentCode()
    {
        return $this->identCode;
    }
    
    /**
     * @param string $note Optional shipment note
     * @return \jtl\Connector\Model\Shipment
     */
    public function setNote($note)
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string Optional shipment note
     */
    public function getNote()
    {
        return $this->note;
    }
    
    /**
     * @param string $trackingUrl
     * @return \jtl\Connector\Model\Shipment
     */
    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = $trackingUrl;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->trackingUrl;
    }
}
