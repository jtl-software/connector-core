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
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = null;

    /**
     * @var jtl\Connector\Model\CrossSellingGroupI18n[] 
     * @Serializer\Type("array<jtl\Connector\Model\CrossSellingGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->crossSellingGroupId = new Identity();
    }

    /**
     * @param Identity $crossSellingGroupId 
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId)
    {
        return $this->setProperty('crossSellingGroupId', $crossSellingGroupId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getCrossSellingGroupId()
    {
        return $this->crossSellingGroupId;
    }

    /**
     * @param \jtl\Connector\Model\CrossSellingGroupI18n $i18n
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function addI18n(\jtl\Connector\Model\CrossSellingGroupI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\CrossSellingGroupI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
}
