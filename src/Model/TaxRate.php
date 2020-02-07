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
class TaxRate extends AbstractIdentity
{
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("rate")
     * @Serializer\Accessor(getter="getRate",setter="setRate")
     */
    protected $rate = 0.0;

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
