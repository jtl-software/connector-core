<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized warehouse name..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class WarehouseI18n extends DataModel
{
    /**
     * @var Identity Reference to warehouse
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getWarehouseId",setter="setWarehouseId")
     */
    protected $warehouseId = null;

    /**
     * @var string Localized warehouse name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->warehouseId = new Identity;
    }

    /**
     * @param  Identity $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\WarehouseI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        return $this->setProperty('warehouseId', $warehouseId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized warehouse name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
