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
class Payment extends AbstractIdentity
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("billingInfo")
     * @Serializer\Accessor(getter="getBillingInfo",setter="setBillingInfo")
     */
    protected $billingInfo = '';
    
    /**
     * @var \DateTimeInterface
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentModuleCode")
     * @Serializer\Accessor(getter="getPaymentModuleCode",setter="setPaymentModuleCode")
     */
    protected $paymentModuleCode = '';
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("totalSum")
     * @Serializer\Accessor(getter="getTotalSum",setter="setTotalSum")
     */
    protected $totalSum = 0.0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("transactionId")
     * @Serializer\Accessor(getter="getTransactionId",setter="setTransactionId")
     */
    protected $transactionId = '';

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->customerOrderId = new Identity();
    }
    
    /**
     * @param Identity $customerOrderId
     * @return Payment
     */
    public function setCustomerOrderId(Identity $customerOrderId): Payment
    {
        $this->customerOrderId = $customerOrderId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerOrderId(): Identity
    {
        return $this->customerOrderId;
    }

    /**
     * @param string $billingInfo
     * @return Payment
     */
    public function setBillingInfo(string $billingInfo): Payment
    {
        $this->billingInfo = $billingInfo;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBillingInfo(): string
    {
        return $this->billingInfo;
    }
    
    /**
     * @param \DateTimeInterface $creationDate
     * @return Payment
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): Payment
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return \DateTimeInterface
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $paymentModuleCode
     * @return Payment
     */
    public function setPaymentModuleCode(string $paymentModuleCode): Payment
    {
        $this->paymentModuleCode = $paymentModuleCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentModuleCode(): string
    {
        return $this->paymentModuleCode;
    }
    
    /**
     * @param double $totalSum
     * @return Payment
     */
    public function setTotalSum(float $totalSum): Payment
    {
        $this->totalSum = $totalSum;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTotalSum(): float
    {
        return $this->totalSum;
    }
    
    /**
     * @param string $transactionId
     * @return Payment
     */
    public function setTransactionId(string $transactionId): Payment
    {
        $this->transactionId = $transactionId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }
}
