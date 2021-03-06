<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Billing address of a customer (order)
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderBillingAddress extends AbstractOrderAddress
{
    /**
     * @var string VAT number (german "USt-ID")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("vatNumber")
     * @Serializer\Accessor(getter="getVatNumber",setter="setVatNumber")
     */
    protected $vatNumber = '';

    /**
     * @param string $vatNumber VAT number (german "USt-ID")
     * @return CustomerOrderBillingAddress
     */
    public function setVatNumber(string $vatNumber): CustomerOrderBillingAddress
    {
        $this->vatNumber = $vatNumber;
        
        return $this;
    }
    
    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }
}
