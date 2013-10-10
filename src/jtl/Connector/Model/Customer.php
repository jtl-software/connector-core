<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer Model
 * @access public
 */
class Customer extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var string
     */
    protected $_customerGroupId = "0";
    
    /**
     * @var string
     */
    protected $_localeName = '';
    
    /**
     * @var string
     */
    protected $_customerNumber = '';
    
    /**
     * @var string
     */
    protected $_password = '';
    
    /**
     * @var string
     */
    protected $_salutation = '';
    
    /**
     * @var string
     */
    protected $_title = '';
    
    /**
     * @var string
     */
    protected $_firstName = '';
    
    /**
     * @var string
     */
    protected $_lastName = '';
    
    /**
     * @var string
     */
    protected $_company = '';
    
    /**
     * @var string
     */
    protected $_street = '';
    
    /**
     * @var string
     */
    protected $_streetNumber = '';
    
    /**
     * @var string
     */
    protected $_deliveryInstruction = '';
    
    /**
     * @var string
     */
    protected $_extraAddressLine = '';
    
    /**
     * @var string
     */
    protected $_zipCode = '';
    
    /**
     * @var string
     */
    protected $_city = '';
    
    /**
     * @var string
     */
    protected $_state = '';
    
    /**
     * @var string
     */
    protected $_countryIso = '';
    
    /**
     * @var string
     */
    protected $_phone = '';
    
    /**
     * @var string
     */
    protected $_mobile = '';
    
    /**
     * @var string
     */
    protected $_fax = '';
    
    /**
     * @var string
     */
    protected $_eMail = '';
    
    /**
     * @var string
     */
    protected $_vatNumber = '';
    
    /**
     * @var string
     */
    protected $_www = '';
    
    /**
     * @var double
     */
    protected $_accountCredit = 0.0;
    
    /**
     * @var bool
     */
    protected $_hasNewsletterSubscription = false;
    
    /**
     * @var string
     */
    protected $_birthday = '';
    
    /**
     * @var double
     */
    protected $_discount = 0.0;
    
    /**
     * @var string
     */
    protected $_origin = '';
    
    /**
     * @var string
     */
    protected $_created = '';
    
    /**
     * @var string
     */
    protected $_modified = '';
    
    /**
     * @var bool
     */
    protected $_isActive = false;
    
    /**
     * @var bool
     */
    protected $_isFetched = false;
    
    /**
     * @var bool
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
                case "_streetNumber":
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