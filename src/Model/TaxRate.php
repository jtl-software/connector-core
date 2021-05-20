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
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 *
 * @Serializer\AccessType("public_method")
 */
class TaxRate extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryIso")
     * @Serializer\Accessor(getter="getRate",setter="setRate")
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
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }

    /**
     * @param Identity $id
     * @return TaxRate
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): self
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

    /**
     * @return double
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param double $rate
     * @return TaxRate
     */
    public function setRate(float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }
}
