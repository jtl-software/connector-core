
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
 * Localized delivery status text. Delivery status is set in the Wawi-ERP. 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class DeliveryStatus extends DataModel
{

    /**
     * @var Identity DeliveryStatus id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;


    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';


    /**
     * @var string Localized delivery status text
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->id = new Identity();
    }
	
 
    /**
     * @param Identity $id DeliveryStatus id
     * @return \jtl\Connector\Model\DeliveryStatus
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity DeliveryStatus id
     */
    public function getId()
    {
        return $this->id;
    }
	
 
    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }
	
 
    /**
     * @param string $name Localized delivery status text
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized delivery status text
     */
    public function getName()
    {
        return $this->name;
    }


}
