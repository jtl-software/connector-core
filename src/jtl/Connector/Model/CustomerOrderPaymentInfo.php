<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPaymentInfo Model
 * Additional payment info for direct debit / banktransfer or payment by credit card. 
 *
 * @access public
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var string - Unique customerOrderPaymentInfo id
     */
    protected $_id = '0';
    
    /**
     * @var string - Reference to customerOrder
     */
    protected $_customerOrderId = '0';
    
    /**
     * @var string - Bank name
     */
    protected $_bankName = '';
    
    /**
     * @var string - Bank code (deprecated in DE since SEPA)
     */
    protected $_bankCode = '';
    
    /**
     * @var string - Bank account holder name
     */
    protected $_accountHolder = '';
    
    /**
     * @var string - Bank account number (deprecated in DE since SEPA)
     */
    protected $_accountNumber = '';
    
    /**
     * @var string - International Bank Account Number (IBAN)
     */
    protected $_iban = '';
    
    /**
     * @var string - Bank Identifier Code (BIC)
     */
    protected $_bic = '';
    
    /**
     * @var string - Credit card number
     */
    protected $_creditCardNumber = '';
    
    /**
     * @var string - Credit card verification number
     */
    protected $_creditCardVerificationNumber = '';
    
    /**
     * @var string - Credit card expiration date
     */
    protected $_creditCardExpiration = '';
    
    /**
     * @var string - Credit card type (e.g. "visa")
     */
    protected $_creditCardType = '';
    
    /**
     * @var string - Credit card holder name
     */
    protected $_creditCardHolder = '';
    
    /**
     * CustomerOrderPaymentInfo Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_customerOrderId":
                case "_bankName":
                case "_bankCode":
                case "_accountHolder":
                case "_accountNumber":
                case "_iban":
                case "_bic":
                case "_creditCardNumber":
                case "_creditCardVerificationNumber":
                case "_creditCardExpiration":
                case "_creditCardType":
                case "_creditCardHolder":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>