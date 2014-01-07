<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer Model
 * Customer address data and preference properties.
 *
 * @access public
 */
class Customer extends DataModel
{
    /**
     * @var string - Unique customer id
     */
    protected $_id = '';
    
    /**
     * @var string - References a customer group
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string - User locale preference
     */
    protected $_localeName = '';
    
    /**
     * @var string - Optional customer number set by JTL-Wawi ERP software
     */
    protected $_customerNumber = '';
    
    /**
     * @var string - Optional (encrypted!) customer password
     */
    protected $_password = '';
    
    /**
     * @var string - Salutation (german: "Anrede")
     */
    protected $_salutation = '';
    
    /**
     * @var string - Title, e.g. "Prof. Dr."
     */
    protected $_title = '';
    
    /**
     * @var string - First name
     */
    protected $_firstName = '';
    
    /**
     * @var string - Last name
     */
    protected $_lastName = '';
    
    /**
     * @var string - Company name
     */
    protected $_company = '';
    
    /**
     * @var string - Street name
     */
    protected $_street = '';
    
    /**
     * @var string - Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';
    
    /**
     * @var string - Extra address line e.g. "Apartment 2.5"
     */
    protected $_extraAddressLine = '';
    
    /**
     * @var string - ZIP / postal code
     */
    protected $_zipCode = '';
    
    /**
     * @var string - City
     */
    protected $_city = '';
    
    /**
     * @var string - State
     */
    protected $_state = '';
    
    /**
     * @var string - Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';
    
    /**
     * @var string - Phone number
     */
    protected $_phone = '';
    
    /**
     * @var string - Mobile phone number
     */
    protected $_mobile = '';
    
    /**
     * @var string - Fax number
     */
    protected $_fax = '';
    
    /**
     * @var string - E-Mail address
     */
    protected $_eMail = '';
    
    /**
     * @var string - VAT number (german "USt-ID")
     */
    protected $_vatNumber = '';
    
    /**
     * @var string - WWW address
     */
    protected $_www = '';
    
    /**
     * @var double - Credit value on customer account in default currency
     */
    protected $_accountCredit = 0.0;
    
    /**
     * @var bool - Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $_hasNewsletterSubscription = false;
    
    /**
     * @var string - Date of birth
     */
    protected $_birthday = '';
    
    /**
     * @var double - Percentual discount for customer on all prices
     */
    protected $_discount = 0.0;
    
    /**
     * @var string - Customer origin
     */
    protected $_origin = '';
    
    /**
     * @var string - Creation date
     */
    protected $_created = '';
    
    /**
     * @var string - Last modified date
     */
    protected $_modified = '';
    
    /**
     * @var bool - Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $_isActive = true;
    
    /**
     * @var bool - Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     */
    protected $_isFetched = false;
    
    /**
     * @var bool - Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     */
    protected $_hasCustomerAccount = false;
    
    /**
     * Customer Setter
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
                case "_customerGroupId":
                case "_localeName":
                case "_customerNumber":
                case "_password":
                case "_salutation":
                case "_title":
                case "_firstName":
                case "_lastName":
                case "_company":
                case "_street":
                case "_deliveryInstruction":
                case "_extraAddressLine":
                case "_zipCode":
                case "_city":
                case "_state":
                case "_countryIso":
                case "_phone":
                case "_mobile":
                case "_fax":
                case "_eMail":
                case "_vatNumber":
                case "_www":
                case "_birthday":
                case "_origin":
                case "_created":
                case "_modified":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_accountCredit":
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_hasNewsletterSubscription":
                case "_isActive":
                case "_isFetched":
                case "_hasCustomerAccount":
                
                    $this->$name = (bool)$value;
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