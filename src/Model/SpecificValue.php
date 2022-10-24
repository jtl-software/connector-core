<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Specific value properties to define a new specificValue with a sort number.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificValue extends AbstractIdentity
{
    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 1;

    /**
     * @var SpecificValueI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\SpecificValueI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * @param integer $sort Optional sort number
     * @return SpecificValue
     */
    public function setSort(int $sort): SpecificValue
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return integer Optional sort number
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param SpecificValueI18n $i18n
     * @return SpecificValue
     */
    public function addI18n(SpecificValueI18n $i18n): SpecificValue
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @param SpecificValueI18n ...$i18ns
     * @return SpecificValue
     */
    public function setI18ns(SpecificValueI18n ...$i18ns): SpecificValue
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return SpecificValueI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @return SpecificValue
     */
    public function clearI18ns(): SpecificValue
    {
        $this->i18ns = [];

        return $this;
    }
}
