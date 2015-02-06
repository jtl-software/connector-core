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
 * Packaging quantities for customergroups.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupPackagingQuantities extends DataModel
{
    /**
     * @var integer Reference to customergroup.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customergroupID")
     * @Serializer\Accessor(getter="getCustomergroupID",setter="setCustomergroupID")
     */
    protected $customergroupID = 0;

    /**
     * @var double Contains the minimum quantity for a customergroup.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("minimumOrderQuantity")
     * @Serializer\Accessor(getter="getMinimumOrderQuantity",setter="setMinimumOrderQuantity")
     */
    protected $minimumOrderQuantity = 0.0;

    /**
     * @var double Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @Serializer\Type("double")
     * @Serializer\SerializedName("packagingQuantity")
     * @Serializer\Accessor(getter="getPackagingQuantity",setter="setPackagingQuantity")
     */
    protected $packagingQuantity = 0.0;

    /**
     * @var integer Reference to product.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = 0;


    /**
     * @param integer $customergroupID Reference to customergroup.
     * @return \jtl\Connector\Model\CustomerGroupPackagingQuantities
     * @throws \InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setCustomergroupID(integer $customergroupID)
    {
        return $this->setProperty('customergroupID', $customergroupID, 'integer');
    }

    /**
     * @return integer Reference to customergroup.
     */
    public function getCustomergroupID()
    {
        return $this->customergroupID;
    }

    /**
     * @param double $minimumOrderQuantity Contains the minimum quantity for a customergroup.
     * @return \jtl\Connector\Model\CustomerGroupPackagingQuantities
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        return $this->setProperty('minimumOrderQuantity', $minimumOrderQuantity, 'double');
    }

    /**
     * @return double Contains the minimum quantity for a customergroup.
     */
    public function getMinimumOrderQuantity()
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @param double $packagingQuantity Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return \jtl\Connector\Model\CustomerGroupPackagingQuantities
     */
    public function setPackagingQuantity($packagingQuantity)
    {
        return $this->setProperty('packagingQuantity', $packagingQuantity, 'double');
    }

    /**
     * @return double Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getPackagingQuantity()
    {
        return $this->packagingQuantity;
    }

    /**
     * @param integer $productId Reference to product.
     * @return \jtl\Connector\Model\CustomerGroupPackagingQuantities
     * @throws \InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setProductId(integer $productId)
    {
        return $this->setProperty('productId', $productId, 'integer');
    }

    /**
     * @return integer Reference to product.
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
