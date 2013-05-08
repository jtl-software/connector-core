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
abstract class Customer extends DataModel
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
     * @var int
     */
    protected $_languageIso;
    
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
    protected $_country;
    
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
     * @var string
     */
    protected $_isActive;
    
    /**
     * @var string
     */
    protected $_isFetched;
    
    /**
     * @var int
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
            case "_languageIso":
            case "_hasCustomerAccount":
            
                $this->$name = (int)$value;
                break;
        
            case "_customerNumber":
            case "_password":
            case "_salutation":
            case "_title":
            case "_firstName":
            case "_lastName":
            case "_company":
            case "_street":
            case "_streetNumber":
            case "_extraAddressLine":
            case "_zipCode":
            case "_city":
            case "_state":
            case "_country":
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
            case "_isActive":
            case "_isFetched":
            
                $this->$name = (string)$value;
                break;
        
            case "_accountCredit":
            case "_discount":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * Customer Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>