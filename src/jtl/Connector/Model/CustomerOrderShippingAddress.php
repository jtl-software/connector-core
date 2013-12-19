<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderShippingAddress Model
 * 
 *
 * @access public
 */
class CustomerOrderShippingAddress extends DataModel
{
    /**
     * @var string - Unique customerOrderShippingAddress id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to customer
     */
    protected $_customerId = "0";
    
    /**
     * @var string - Salutation e.g. "Mr."
     */
    protected $_salutation = '';
    
    /**
     * @var string - First name
     */
    protected $_firstName = '';
    
    /**
     * @var string - Last name
     */
    protected $_lastName = '';
    
    /**
     * @var string - Title e.g. ("Prof. Dr.")
     */
    protected $_title = '';
    
    /**
     * @var string - Company name
     */
    protected $_company = '';
    
    /**
     * @var string - Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';
    
    /**
     * @var string - Street + streetnumber
     */
    protected $_street = '';
    
    /**
     * @var string - Extra address line e.g. "Apartment 2.5"
     */
    protected $_extraAddressLine = '';
    
    /**
     * @var string - Zip / postal code
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
     * CustomerOrderShippingAddress Setter
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
                case "_customerId":
                case "_salutation":
                case "_firstName":
                case "_lastName":
                case "_title":
                case "_company":
                case "_deliveryInstruction":
                case "_street":
                case "_extraAddressLine":
                case "_zipCode":
                case "_city":
                case "_state":
                case "_countryIso":
                case "_phone":
                case "_mobile":
                case "_fax":
                case "_eMail":
                
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