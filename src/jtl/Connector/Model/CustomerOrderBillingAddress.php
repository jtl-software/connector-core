<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderBillingAddress Model
 * @access public
 */
class CustomerOrderBillingAddress extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customer;
    
    /**
     * @var string
     */
    protected $_salutation;
    
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
    protected $_title;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var string
     */
    protected $_deliveryInstruction;
    
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
     * CustomerOrderBillingAddress Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_customer":
            
                $this->$name = (int)$value;
                break;
        
            case "_salutation":
            case "_firstName":
            case "_lastName":
            case "_title":
            case "_company":
            case "_deliveryInstruction":
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
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * CustomerOrderBillingAddress Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
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