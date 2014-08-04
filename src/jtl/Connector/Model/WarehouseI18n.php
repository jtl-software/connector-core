<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized warehouse name..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class WarehouseI18n extends DataModel
{
    /**
     * @type Identity Reference to warehouse
     */
    protected $warehouseId = null;

    /**
     * @type string Localized warehouse name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'warehouseId',
    );

    /**
     * @param  Identity $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\WarehouseI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        return $this->setProperty('WarehouseId', $warehouseId, 'Identity');
    }

    /**
     * @return Identity Reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @param  string $name Localized warehouse name
     * @return \jtl\Connector\Model\WarehouseI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized warehouse name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
