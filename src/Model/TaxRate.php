<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TaxRate extends AbstractDataModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("rate")
     * @Serializer\Accessor(getter="getRate",setter="setRate")
     */
    protected $rate = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id
     * @return TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): TaxRate
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
     * @param double $rate
     * @return TaxRate
     */
    public function setRate(float $rate): TaxRate
    {
        $this->rate = $rate;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getRate(): float
    {
        return $this->rate;
    }
}
