<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Customer order properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrder extends DataModel
{
    /**
     * @type Identity Reference to billingAddress
     */
    public $_billingAddressId = null;

    /**
     * @type Identity 
     */
    public $_companyId = null;

    /**
     * @type Identity Optional reference to customer. 
     */
    public $_customerId = null;

    /**
     * @type Identity Unique customerOrder id
     */
    public $_id = null;

    /**
     * @type Identity Reference to shippingAddress
     */
    public $_shippingAddressId = null;

    /**
     * @type DateTime|null Date of creation
     */
    public $_created = null;

    /**
     * @type string Currency ISO set, when customerOrder was finished
     */
    public $_currencyIso = '';

    /**
     * @type DateTime|null Optional Estimated delivery date set by ERP System
     */
    public $_estimatedDeliveryDate = null;

    /**
     * @type float 
     */
    public $_factor = 0.0;

    /**
     * @type boolean 
     */
    public $_isFullyDelivered = false;

    /**
     * @type boolean 
     */
    public $_isPlatform = false;

    /**
     * @type integer 
     */
    public $_languageId = 0;

    /**
     * @type integer|null 
     */
    public $_nGesperrt = 0;

    /**
     * @type string Optional order number (usually set by ERP System later)
     */
    public $_orderNumber = '';

    /**
     * @type DateTime|null Payment date
     */
    public $_paymentDate = null;

    /**
     * @type string Optional payment module code
     */
    public $_paymentModuleCode = '';

    /**
     * @type DateTime|null Shipping date
     */
    public $_shippingDate = null;

    /**
     * @type string Additional shipping info
     */
    public $_shippingInfo = '';

    /**
     * @type string 
     */
    public $_status = '';

    /**
     * Nav [CustomerOrder » One]
     *
     * @type \jtl\Connector\Model\CustomerOrderItem[]
     */
    public $_positions = array();

    /**
     * Nav [CustomerOrder » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderAttr[]
     */
    public $_attributes = array();

    /**
     * Nav [CustomerOrder » Many]
     *
     * @type \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    public $_billingAddress = array();

    /**
     * Nav [CustomerOrder » Many]
     *
     * @type \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    public $_shippingAddress = array();

    /**
     * Nav [CustomerOrder » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    public $_paymentInfo = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerId',
        '_shippingAddressId',
        '_billingAddressId',
        '_companyId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_positions' => '\jtl\Connector\Model\CustomerOrderItem',
        '_attributes' => '\jtl\Connector\Model\CustomerOrderAttr',
        '_billingAddress' => '\jtl\Connector\Model\CustomerOrderBillingAddress',
        '_shippingAddress' => '\jtl\Connector\Model\CustomerOrderShippingAddress',
        '_paymentInfo' => '\jtl\Connector\Model\CustomerOrderPaymentInfo',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $orderNumber Optional order number (usually set by ERP System later)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrderNumber($orderNumber)
    {
        return $this->setProperty('_orderNumber', $orderNumber, 'string');
    }
    
    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->_orderNumber;
    }

    /**
     * @param  DateTime $created Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('_created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Date of creation
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param  string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShippingInfo($shippingInfo)
    {
        return $this->setProperty('_shippingInfo', $shippingInfo, 'string');
    }
    
    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo()
    {
        return $this->_shippingInfo;
    }

    /**
     * @param  DateTime $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setShippingDate(DateTime $shippingDate)
    {
        return $this->setProperty('_shippingDate', $shippingDate, 'DateTime');
    }
    
    /**
     * @return DateTime Shipping date
     */
    public function getShippingDate()
    {
        return $this->_shippingDate;
    }

    /**
     * @param  DateTime $estimatedDeliveryDate Optional Estimated delivery date set by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setEstimatedDeliveryDate(DateTime $estimatedDeliveryDate)
    {
        return $this->setProperty('_estimatedDeliveryDate', $estimatedDeliveryDate, 'DateTime');
    }
    
    /**
     * @return DateTime Optional Estimated delivery date set by ERP System
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->_estimatedDeliveryDate;
    }

    /**
     * @param  string $currencyIso Currency ISO set, when customerOrder was finished
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCurrencyIso($currencyIso)
    {
        return $this->setProperty('_currencyIso', $currencyIso, 'string');
    }
    
    /**
     * @return string Currency ISO set, when customerOrder was finished
     */
    public function getCurrencyIso()
    {
        return $this->_currencyIso;
    }

    /**
     * @param  integer $languageId 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLanguageId($languageId)
    {
        return $this->setProperty('_languageId', $languageId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->_languageId;
    }

    /**
     * @param  string $paymentModuleCode Optional payment module code
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPaymentModuleCode($paymentModuleCode)
    {
        return $this->setProperty('_paymentModuleCode', $paymentModuleCode, 'string');
    }
    
    /**
     * @return string Optional payment module code
     */
    public function getPaymentModuleCode()
    {
        return $this->_paymentModuleCode;
    }

    /**
     * @param  DateTime $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setPaymentDate(DateTime $paymentDate)
    {
        return $this->setProperty('_paymentDate', $paymentDate, 'DateTime');
    }
    
    /**
     * @return DateTime Payment date
     */
    public function getPaymentDate()
    {
        return $this->_paymentDate;
    }

    /**
     * @param  float $factor 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFactor($factor)
    {
        return $this->setProperty('_factor', $factor, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFactor()
    {
        return $this->_factor;
    }

    /**
     * @param  integer $nGesperrt 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNGesperrt($nGesperrt)
    {
        return $this->setProperty('_nGesperrt', $nGesperrt, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNGesperrt()
    {
        return $this->_nGesperrt;
    }

    /**
     * @param  Identity $id Unique customerOrder id
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrder id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerId Optional reference to customer. 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('_customerId', $customerId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to customer. 
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }

    /**
     * @param  Identity $shippingAddressId Reference to shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('_shippingAddressId', $shippingAddressId, 'Identity');
    }
    
    /**
     * @return Identity Reference to shippingAddress
     */
    public function getShippingAddressId()
    {
        return $this->_shippingAddressId;
    }

    /**
     * @param  Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        return $this->setProperty('_billingAddressId', $billingAddressId, 'Identity');
    }
    
    /**
     * @return Identity Reference to billingAddress
     */
    public function getBillingAddressId()
    {
        return $this->_billingAddressId;
    }

    /**
     * @param  Identity $companyId 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCompanyId(Identity $companyId)
    {
        return $this->setProperty('_companyId', $companyId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCompanyId()
    {
        return $this->_companyId;
    }

    /**
     * @param  boolean $isPlatform 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsPlatform($isPlatform)
    {
        return $this->setProperty('_isPlatform', $isPlatform, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsPlatform()
    {
        return $this->_isPlatform;
    }

    /**
     * @param  boolean $isFullyDelivered 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsFullyDelivered($isFullyDelivered)
    {
        return $this->setProperty('_isFullyDelivered', $isFullyDelivered, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsFullyDelivered()
    {
        return $this->_isFullyDelivered;
    }

    /**
     * @param  string $status 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStatus($status)
    {
        return $this->setProperty('_status', $status, 'string');
    }
    
    /**
     * @return string 
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItem $position
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPosition(\jtl\Connector\Model\CustomerOrderItem $position)
    {
        $this->_positions[] = $position;
        return $this;
    }
    
    /**
     * @return CustomerOrderItem
     */
    public function getPositions()
    {
        return $this->_positions;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPositions()
    {
        $this->_positions = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderAttr $attribute
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addAttribute(\jtl\Connector\Model\CustomerOrderAttr $attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CustomerOrderAttr
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearAttributes()
    {
        $this->_attributes = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addBillingAddress(\jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress)
    {
        $this->_billingAddress[] = $billingAddress;
        return $this;
    }
    
    /**
     * @return CustomerOrderBillingAddress
     */
    public function getBillingAddress()
    {
        return $this->_billingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearBillingAddress()
    {
        $this->_billingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addShippingAddress(\jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress)
    {
        $this->_shippingAddress[] = $shippingAddress;
        return $this;
    }
    
    /**
     * @return CustomerOrderShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->_shippingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearShippingAddress()
    {
        $this->_shippingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPaymentInfo(\jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo)
    {
        $this->_paymentInfo[] = $paymentInfo;
        return $this;
    }
    
    /**
     * @return CustomerOrderPaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->_paymentInfo;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPaymentInfo()
    {
        $this->_paymentInfo = array();
        return $this;
    }
}

