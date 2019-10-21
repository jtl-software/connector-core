<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var CrossSellingGroupI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\CrossSellingGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id
     * @return CrossSellingGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CrossSellingGroup
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param CrossSellingGroupI18n $i18n
     * @return CrossSellingGroup
     */
    public function addI18n(CrossSellingGroupI18n $i18n): CrossSellingGroup
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param CrossSellingGroupI18n ...$i18ns
     * @return CrossSellingGroup
     */
    public function setI18ns(CrossSellingGroupI18n ...$i18ns): CrossSellingGroup
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return CrossSellingGroupI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return CrossSellingGroup
     */
    public function clearI18ns(): CrossSellingGroup
    {
        $this->i18ns = [];
        
        return $this;
    }
}
