<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrder Model
 * 
 *
 * @access public
 */
class CustomerOrder extends DataModel
{
    /**
     * @var string - Unique customerOrder id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to customer
     */
    protected $_customerId = "0";
    
    /**
     * @var string - Reference to shippingAddress
     */
    protected $_shippingAddressId = "0";
    
    /**
     * @var string - Reference to billingAddress
     */
    protected $_billingAddressId = "0";
    
    /**
     * @var string - Reference to shippingMethod
     */
    protected $_shippingMethodId = "0";
    
    /**
     * @var string - Locale set when customerOrder was finished
     */
    protected $_localeName = '';
    
    /**
     * @var string - Currency ISO set, when customerOrder was finished
     */
    protected $_currencyIso = '';
    
    /**
     * @var string - Estimated delivery date set by ERP System
     */
    protected $_estimatedDeliveryDate = '';
    
    /**
     * @var double - Customer credit (credit reduces total sum)
     */
    protected $_credit = 0.0;
    
    /**
     * @var double - Total sum to pay
     */
    protected $_totalSum = 0.0;
    
    /**
     * @var string - Session id or session hash
     */
    protected $_session = '';
    
    /**
     * @var string - Shipping method name
     */
    protected $_shippingMethodName = '';
    
    /**
     * @var string - Order number (set by ERP System)
     */
    protected $_orderNumber = '';
    
    /**
     * @var string - Additional shipping info
     */
    protected $_shippingInfo = '';
    
    /**
     * @var string - Shipping date
     */
    protected $_shippingDate = '';
    
    /**
     * @var string - Payment date
     */
    protected $_paymentDate = '';
    
    /**
     * @var string - Date when customer will receive notification to rate order
     */
    protected $_ratingNotificationDate = '';
    
    /**
     * @var   - TrackingID (not Tracking URL)
     */
    protected $_tracking;
    
    /**
     * @var string - Additional note
     */
    protected $_note = '';
    
    /**
     * @var string - Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string - Tracking URL
     */
    protected $_trackingURL = '';
    
    /**
     * @var string - Customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    protected $_ip = '';
    
    /**
     * @var bool - Flag if customerOrder is fetched by ERP System
     */
    protected $_isFetched = false;
    
    /**
     * @var string - Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    protected $_status = '';
    
    /**
     * @var string - Date of creation
     */
    protected $_created = '';
    
    /**
     * @var string - Payment module id
     */
    protected $_paymentModuleId = "0";
    
    /**
     * CustomerOrder Setter
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
                case "_shippingAddressId":
                case "_billingAddressId":
                case "_shippingMethodId":
                case "_localeName":
                case "_currencyIso":
                case "_estimatedDeliveryDate":
                case "_session":
                case "_shippingMethodName":
                case "_orderNumber":
                case "_shippingInfo":
                case "_shippingDate":
                case "_paymentDate":
                case "_ratingNotificationDate":
                case "_note":
                case "_logistic":
                case "_trackingURL":
                case "_ip":
                case "_status":
                case "_created":
                case "_paymentModuleId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_credit":
                case "_totalSum":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_tracking":
                
                    $this->$name = ( )$value;
                    break;
            
                case "_isFetched":
                
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