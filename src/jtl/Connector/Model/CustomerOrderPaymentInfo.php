<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    public $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderPaymentInfo id
     */
    public $_id = null;

    /**
     * @type Identity 
     */
    public $_platformId = null;

    /**
     * @type string Bank account holder name
     */
    public $_accountHolder = '';

    /**
     * @type string Bank account number (deprecated in DE since SEPA)
     */
    public $_accountNumber = '';

    /**
     * @type string 
     */
    public $_bankAccount = '';

    /**
     * @type string Bank code (deprecated in DE since SEPA)
     */
    public $_bankCode = '';

    /**
     * @type string 
     */
    public $_cBIC = '';

    /**
     * @type string 
     */
    public $_cIBAN = '';

    /**
     * @type string Credit card number
     */
    public $_creditCardNumber = '';

    /**
     * @type string 
     */
    public $_cvv = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerOrderId',
        '_platformId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
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
     * @param  string $bankAccount 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankAccount($bankAccount)
    {
        return $this->setProperty('_bankAccount', $bankAccount, 'string');
    }
    
    /**
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->_bankAccount;
    }

    /**
     * @param  string $bankCode Bank code (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankCode($bankCode)
    {
        return $this->setProperty('_bankCode', $bankCode, 'string');
    }
    
    /**
     * @return string Bank code (deprecated in DE since SEPA)
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }

    /**
     * @param  string $accountNumber Bank account number (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountNumber($accountNumber)
    {
        return $this->setProperty('_accountNumber', $accountNumber, 'string');
    }
    
    /**
     * @return string Bank account number (deprecated in DE since SEPA)
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }

    /**
     * @param  string $creditCardNumber Credit card number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        return $this->setProperty('_creditCardNumber', $creditCardNumber, 'string');
    }
    
    /**
     * @return string Credit card number
     */
    public function getCreditCardNumber()
    {
        return $this->_creditCardNumber;
    }

    /**
     * @param  string $cvv 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCvv($cvv)
    {
        return $this->setProperty('_cvv', $cvv, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCvv()
    {
        return $this->_cvv;
    }

    /**
     * @param  string $accountHolder Bank account holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountHolder($accountHolder)
    {
        return $this->setProperty('_accountHolder', $accountHolder, 'string');
    }
    
    /**
     * @return string Bank account holder name
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }

    /**
     * @param  string $cIBAN 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCIBAN($cIBAN)
    {
        return $this->setProperty('_cIBAN', $cIBAN, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCIBAN()
    {
        return $this->_cIBAN;
    }

    /**
     * @param  string $cBIC 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBIC($cBIC)
    {
        return $this->setProperty('_cBIC', $cBIC, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBIC()
    {
        return $this->_cBIC;
    }

    /**
     * @param  Identity $id Unique customerOrderPaymentInfo id
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderPaymentInfo id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('_customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }

    /**
     * @param  Identity $platformId 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPlatformId(Identity $platformId)
    {
        return $this->setProperty('_platformId', $platformId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getPlatformId()
    {
        return $this->_platformId;
    }
}

