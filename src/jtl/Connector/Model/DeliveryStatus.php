<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized delivery status text. Delivery status is set in the Wawi-ERP. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class DeliveryStatus extends DataModel
{
    /**
     * @type Identity DeliveryStatus id
     */
    protected $id = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized delivery status text
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id DeliveryStatus id
     * @return \jtl\Connector\Model\DeliveryStatus
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity DeliveryStatus id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\DeliveryStatus
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name Localized delivery status text
     * @return \jtl\Connector\Model\DeliveryStatus
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized delivery status text
     */
    public function getName()
    {
        return $this->name;
    }

 
}
