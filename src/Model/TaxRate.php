<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryIso")
     * @Serializer\Accessor(getter="getCountryIso",setter="setCountryIso")
     */
    protected $countryIso = '';

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

    /**
     * @return string
     */
    public function getCountryIso(): string
    {
        return $this->countryIso;
    }

    /**
     * @param string $countryIso
     * @return TaxRate
     */
    public function setCountryIso(string $countryIso): self
    {
        $this->countryIso = $countryIso;
        
        return $this;
    }
}
