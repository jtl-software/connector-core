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
     * @return \jtl\Connector\Model\Payment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->customerOrderId = $customerOrderId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }
    
    /**
     * @param Identity $id
     * @return \jtl\Connector\Model\Payment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
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
     * @return \jtl\Connector\Model\Payment
     */
    public function setBillingInfo($billingInfo)
    {
        $this->billingInfo = $billingInfo;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBillingInfo()
    {
        return $this->billingInfo;
    }
    
    /**
     * @param DateTime $creationDate
     * @return \jtl\Connector\Model\Payment
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $paymentModuleCode
     * @return \jtl\Connector\Model\Payment
     */
    public function setPaymentModuleCode($paymentModuleCode)
    {
        $this->paymentModuleCode = $paymentModuleCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentModuleCode()
    {
        return $this->paymentModuleCode;
    }
    
    /**
     * @param double $totalSum
     * @return \jtl\Connector\Model\Payment
     */
    public function setTotalSum($totalSum)
    {
        $this->totalSum = $totalSum;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }
    
    /**
     * @param string $transactionId
     * @return \jtl\Connector\Model\Payment
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }
}
