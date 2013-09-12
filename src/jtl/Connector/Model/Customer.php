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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var string
     */
    protected $_localeName;
    
    /**
     * @var string
     */
    protected $_customerNumber;
    
    /**
     * @var string
     */
    protected $_password;
    
    /**
     * @var string
     */
    protected $_salutation;
    
    /**
     * @var string
     */
    protected $_title;
    
    /**
     * @var string
     */
    protected $_firstName;
    
    /**
     * @var string
     */
    protected $_lastName;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var string
     */
    protected $_street;
    
    /**
     * @var string
     */
    protected $_streetNumber;
    
    /**
     * @var string
     */
    protected $_deliveryInstruction;
    
    /**
     * @var string
     */
    protected $_extraAddressLine;
    
    /**
     * @var string
     */
    protected $_zipCode;
    
    /**
     * @var string
     */
    protected $_city;
    
    /**
     * @var string
     */
    protected $_state;
    
    /**
     * @var string
     */
    protected $_countryIso;
    
    /**
     * @var string
     */
    protected $_phone;
    
    /**
     * @var string
     */
    protected $_mobile;
    
    /**
     * @var string
     */
    protected $_fax;
    
    /**
     * @var string
     */
    protected $_eMail;
    
    /**
     * @var string
     */
    protected $_vatNumber;
    
    /**
     * @var string
     */
    protected $_www;
    
    /**
     * @var double
     */
    protected $_accountCredit;
    
    /**
     * @var string
     */
    protected $_newsletter;
    
    /**
     * @var string
     */
    protected $_birthday;
    
    /**
     * @var double
     */
    protected $_discount;
    
    /**
     * @var string
     */
    protected $_origin;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_modified;
    
    /**
     * @var bool
     */
    protected $_isActive;
    
    /**
     * @var bool
     */
    protected $_isFetched;
    
    /**
     * @var bool
     */
    protected $_hasCustomerAccount;
    
    /**
     * Customer Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_customerGroupId":
            
                $this->$name = (int)$value;
                break;
        
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
            case "_newsletter":
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
        
            case "_isActive":
            case "_isFetched":
            case "_hasCustomerAccount":
            
                $this->$name = (bool)$value;
                break;
        
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