<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Payment extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;
    
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
     * @Serializer\SerializedName("billingInfo")
     * @Serializer\Accessor(getter="getBillingInfo",setter="setBillingInfo")
     */
    protected $billingInfo = '';
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
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
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->customerOrderId = new Identity();
    }
    
    /**
     * @param Identity $customerOrderId
     * @return Payment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param Identity $id
     * @return Payment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Payment
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
     * @param DateTime $creationDate
     * @return Payment
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null): Payment
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate(): DateTime
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
