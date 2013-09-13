<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrder Model
 * @access public
 */
class CustomerOrder extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerId;
    
    /**
     * @var int
     */
    protected $_shippingAddressId;
    
    /**
     * @var int
     */
    protected $_billingAddressId;
    
    /**
     * @var int
     */
    protected $_paymentMethodId;
    
    /**
     * @var int
     */
    protected $_shippingMethodId;
    
    /**
     * @var string
     */
    protected $_localeName;
    
    /**
     * @var int
     */
    protected $_currencyIso;
    
    /**
     * @var int
     */
    protected $_paymentMethodType;
    
    /**
     * @var double
     */
    protected $_credit;
    
    /**
     * @var double
     */
    protected $_totalSum;
    
    /**
     * @var string
     */
    protected $_session;
    
    /**
     * @var string
     */
    protected $_shippingMethodName;
    
    /**
     * @var string
     */
    protected $_paymentMethodName;
    
    /**
     * @var string
     */
    protected $_orderNumber;
    
    /**
     * @var string
     */
    protected $_shippingInfo;
    
    /**
     * @var string
     */
    protected $_shippingDate;
    
    /**
     * @var string
     */
    protected $_paymentDate;
    
    /**
     * @var string
     */
    protected $_ratingNotificationDate;
    
    /**
     * @var string
     */
    protected $_tracking;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @var string
     */
    protected $_logistic;
    
    /**
     * @var string
     */
    protected $_trackingURL;
    
    /**
     * @var string
     */
    protected $_ip;
    
    /**
     * @var bool
     */
    protected $_isFetched;
    
    /**
     * @var string
     */
    protected $_status;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_paymentModuleId;
    
    /**
     * CustomerOrder Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_customerId":
            case "_shippingAddressId":
            case "_billingAddressId":
            case "_paymentMethodId":
            case "_shippingMethodId":
            case "_currencyIso":
            case "_paymentMethodType":
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
                break;
        
            case "_localeName":
            case "_session":
            case "_shippingMethodName":
            case "_paymentMethodName":
            case "_orderNumber":
            case "_shippingInfo":
            case "_shippingDate":
            case "_paymentDate":
            case "_ratingNotificationDate":
            case "_tracking":
            case "_note":
            case "_logistic":
            case "_trackingURL":
            case "_ip":
            case "_status":
            case "_created":
            case "_paymentModuleId":
            
                if (strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_credit":
            case "_totalSum":
            
                if (is_numeric($value)) {
                    $this->$name = (double)$value;                
                }
                break;
        
            case "_isFetched":
            
                if (is_bool($value)) {
                    $this->$name = (bool)$value;
                }
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