<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Company Model
 * Provides company address and bank details
 * @access public
 */
class Company extends DataModel
{
    /**
     * @var string Company name
     */
    protected $_name = '';
    
    /**
     * @var string Company businessman / entrepreneur
     */
    protected $_businessman = '';
    
    /**
     * @var string Street
     */
    protected $_street = '';
    
    /**
     * @var string Street number
     */
    protected $_streetNumber = '';
    
    /**
     * @var string Zip code / postcode
     */
    protected $_zipCode = '';
    
    /**
     * @var string City
     */
    protected $_city = '';
    
    /**
     * @var string Country
     */
    protected $_country = '';
    
    /**
     * @var string Phone number
     */
    protected $_phone = '';
    
    /**
     * @var string Fax number
     */
    protected $_fax = '';
    
    /**
     * @var string Company E-Mail address
     */
    protected $_eMail = '';
    
    /**
     * @var string Company website
     */
    protected $_www = '';
    
    /**
     * @var string Bank code number
     */
    protected $_bankCode = '';
    
    /**
     * @var string Bank account number
     */
    protected $_accountNumber = '';
    
    /**
     * @var string Bank Name e.g. "Deutsche Bank"
     */
    protected $_bankAccount = '';
    
    /**
     * @var string Bank account holder name e.g. "John Doe"
     */
    protected $_accountHolder = '';
    
    /**
     * @var string VAT registration number (german: USt-ID)
     */
    protected $_vatNumber = '';
    
    /**
     * @var string Tax id number (german: Steuernummer)
     */
    protected $_taxIdNumber = '';
    
    /**
     * @var string International Bank Account Number (IBAN) 
     */
    protected $_iban = '';
    
    /**
     * @var string Bank Identifier Code (BIC)
     */
    protected $_bic = '';
    
    /**
     * Company Setter
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
                case "_name":
                case "_businessman":
                case "_street":
                case "_streetNumber":
                case "_zipCode":
                case "_city":
                case "_country":
                case "_phone":
                case "_fax":
                case "_eMail":
                case "_www":
                case "_bankCode":
                case "_accountNumber":
                case "_bankAccount":
                case "_accountHolder":
                case "_vatNumber":
                case "_taxIdNumber":
                case "_iban":
                case "_bic":
                
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