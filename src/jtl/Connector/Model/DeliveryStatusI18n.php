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
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class DeliveryStatusI18n extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("deliveryStatusId")
     * @Serializer\Accessor(getter="getDeliveryStatusId",setter="setDeliveryStatusId")
     */
    protected $deliveryStatusId = null;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deliveryStatusId = new Identity();
    }

    /**
     * @param Identity $deliveryStatusId 
     * @return \jtl\Connector\Model\DeliveryStatusI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryStatusId(Identity $deliveryStatusId)
    {
        return $this->setProperty('deliveryStatusId', $deliveryStatusId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getDeliveryStatusId()
    {
        return $this->deliveryStatusId;
    }

    /**
     * @param string $languageISO 
     * @return \jtl\Connector\Model\DeliveryStatusI18n
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string 
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $name 
     * @return \jtl\Connector\Model\DeliveryStatusI18n
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
