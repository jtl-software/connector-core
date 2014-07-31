<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer order properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrder extends DataModel
{
    /**
     * @type Identity Reference to billingAddress
     */
    protected $billingAddressId = null;

    /**
     * @type Identity 
     */
    protected $companyId = null;

    /**
     * @type Identity Optional reference to customer. 
     */
    protected $customerId = null;

    /**
     * @type Identity Unique customerOrder id
     */
    protected $id = null;

    /**
     * @type Identity Reference to shippingAddress
     */
    protected $shippingAddressId = null;

    /**
     * @type DateTime|null Date of creation
     */
    protected $created = null;

    /**
     * @type string Currency ISO set, when customerOrder was finished
     */
    protected $currencyIso = '';

    /**
     * @type DateTime|null Optional Estimated delivery date set by ERP System
     */
    protected $estimatedDeliveryDate = null;

    /**
     * @type float 
     */
    protected $factor = 0.0;

    /**
     * @type boolean 
     */
    protected $isFullyDelivered = false;

    /**
     * @type boolean 
     */
    protected $isPlatform = false;

    /**
     * @type integer 
     */
    protected $languageId = 0;

    /**
     * @type integer|null 
     */
    protected $nGesperrt = 0;

    /**
     * @type string Optional order number (usually set by ERP System later)
     */
    protected $orderNumber = '';

    /**
     * @type DateTime|null Payment date
     */
    protected $paymentDate = null;

    /**
     * @type string Optional payment module code
     */
    protected $paymentModuleCode = '';

    /**
     * @type DateTime|null Shipping date
     */
    protected $shippingDate = null;

    /**
     * @type string Additional shipping info
     */
    protected $shippingInfo = '';

    /**
     * @type string 
     */
    protected $status = '';

    /**
     * Nav [CustomerOrder » One]
     *
     * @type \jtl\Connector\Model\CustomerOrderItem[]
     */
    protected $positions = array();

    /**
     * Nav [CustomerOrder » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderAttr[]
     */
    protected $attributes = array();

    /**
     * Nav [CustomerOrder » Many]
     *
     * @type \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    protected $billingAddress = array();

    /**
     * Nav [CustomerOrder » Many]
     *
     * @type \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    protected $shippingAddress = array();

    /**
     * Nav [CustomerOrder » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    protected $paymentInfo = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'customerId',
        'shippingAddressId',
        'billingAddressId',
        'companyId',
    );

    /**
     * @param  string $orderNumber Optional order number (usually set by ERP System later)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrderNumber($orderNumber)
    {
        return $this->setProperty('orderNumber', $orderNumber, 'string');
    }
    
    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param  DateTime $created Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Date of creation
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShippingInfo($shippingInfo)
    {
        return $this->setProperty('shippingInfo', $shippingInfo, 'string');
    }
    
    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @param  DateTime $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setShippingDate(DateTime $shippingDate)
    {
        return $this->setProperty('shippingDate', $shippingDate, 'DateTime');
    }
    
    /**
     * @return DateTime Shipping date
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param  DateTime $estimatedDeliveryDate Optional Estimated delivery date set by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setEstimatedDeliveryDate(DateTime $estimatedDeliveryDate)
    {
        return $this->setProperty('estimatedDeliveryDate', $estimatedDeliveryDate, 'DateTime');
    }
    
    /**
     * @return DateTime Optional Estimated delivery date set by ERP System
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param  string $currencyIso Currency ISO set, when customerOrder was finished
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCurrencyIso($currencyIso)
    {
        return $this->setProperty('currencyIso', $currencyIso, 'string');
    }
    
    /**
     * @return string Currency ISO set, when customerOrder was finished
     */
    public function getCurrencyIso()
    {
        return $this->currencyIso;
    }

    /**
     * @param  integer $languageId 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLanguageId($languageId)
    {
        return $this->setProperty('languageId', $languageId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param  string $paymentModuleCode Optional payment module code
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPaymentModuleCode($paymentModuleCode)
    {
        return $this->setProperty('paymentModuleCode', $paymentModuleCode, 'string');
    }
    
    /**
     * @return string Optional payment module code
     */
    public function getPaymentModuleCode()
    {
        return $this->paymentModuleCode;
    }

    /**
     * @param  DateTime $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setPaymentDate(DateTime $paymentDate)
    {
        return $this->setProperty('paymentDate', $paymentDate, 'DateTime');
    }
    
    /**
     * @return DateTime Payment date
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param  float $factor 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFactor($factor)
    {
        return $this->setProperty('factor', $factor, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * @param  integer $nGesperrt 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNGesperrt($nGesperrt)
    {
        return $this->setProperty('nGesperrt', $nGesperrt, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNGesperrt()
    {
        return $this->nGesperrt;
    }

    /**
     * @param  Identity $id Unique customerOrder id
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrder id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $customerId Optional reference to customer. 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to customer. 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  Identity $shippingAddressId Reference to shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('shippingAddressId', $shippingAddressId, 'Identity');
    }
    
    /**
     * @return Identity Reference to shippingAddress
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

    /**
     * @param  Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        return $this->setProperty('billingAddressId', $billingAddressId, 'Identity');
    }
    
    /**
     * @return Identity Reference to billingAddress
     */
    public function getBillingAddressId()
    {
        return $this->billingAddressId;
    }

    /**
     * @param  Identity $companyId 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCompanyId(Identity $companyId)
    {
        return $this->setProperty('companyId', $companyId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param  boolean $isPlatform 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsPlatform($isPlatform)
    {
        return $this->setProperty('isPlatform', $isPlatform, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsPlatform()
    {
        return $this->isPlatform;
    }

    /**
     * @param  boolean $isFullyDelivered 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsFullyDelivered($isFullyDelivered)
    {
        return $this->setProperty('isFullyDelivered', $isFullyDelivered, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsFullyDelivered()
    {
        return $this->isFullyDelivered;
    }

    /**
     * @param  string $status 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStatus($status)
    {
        return $this->setProperty('status', $status, 'string');
    }
    
    /**
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItem $position
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPosition(\jtl\Connector\Model\CustomerOrderItem $position)
    {
        $this->positions[] = $position;
        return $this;
    }
    
    /**
     * @return CustomerOrderItem
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPositions()
    {
        $this->positions = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderAttr $attribute
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addAttribute(\jtl\Connector\Model\CustomerOrderAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CustomerOrderAttr
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addBillingAddress(\jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress)
    {
        $this->billingAddress[] = $billingAddress;
        return $this;
    }
    
    /**
     * @return CustomerOrderBillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearBillingAddress()
    {
        $this->billingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addShippingAddress(\jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress)
    {
        $this->shippingAddress[] = $shippingAddress;
        return $this;
    }
    
    /**
     * @return CustomerOrderShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearShippingAddress()
    {
        $this->shippingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPaymentInfo(\jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo)
    {
        $this->paymentInfo[] = $paymentInfo;
        return $this;
    }
    
    /**
     * @return CustomerOrderPaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPaymentInfo()
    {
        $this->paymentInfo = array();
        return $this;
    }
}

