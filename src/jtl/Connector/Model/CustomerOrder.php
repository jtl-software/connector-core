<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrder Model
 * Customer order properties.
 *
 * @access public
 */
class CustomerOrder extends DataModel
{
    /**
     * @var string - Unique customerOrder id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional reference to customer. 
     */
    protected $_customerId = '';
    
    /**
     * @var string - Reference to shippingAddress
     */
    protected $_shippingAddressId = '';
    
    /**
     * @var string - Reference to billingAddress
     */
    protected $_billingAddressId = '';
    
    /**
     * @var string - Reference to shippingMethod
     */
    protected $_shippingMethodId = '';
    
    /**
     * @var string - Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    protected $_localeName = '';
    
    /**
     * @var string - Currency ISO set, when customerOrder was finished
     */
    protected $_currencyIso = '';
    
    /**
     * @var string - Optional Estimated delivery date set by ERP System
     */
    protected $_estimatedDeliveryDate = '';
    
    /**
     * @var double - Optional customer credit (credit reduces total sum)
     */
    protected $_credit = 0;
    
    /**
     * @var double - Total sum to pay
     */
    protected $_totalSum = 0.0;
    
    /**
     * @var string - Optional session id or session hash
     */
    protected $_session = '';
    
    /**
     * @var string - Optional shipping method name
     */
    protected $_shippingMethodName = '';
    
    /**
     * @var string - Optional order number (usually set by ERP System later)
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
     * @var string - Date from when customer will receive notification to rate order
     */
    protected $_ratingNotificationDate = '';
    
    /**
     * @var string - Optional TrackingID (not Tracking URL)
     */
    protected $_tracking = '';
    
    /**
     * @var string - Optional additional note
     */
    protected $_note = '';
    
    /**
     * @var string - Optional Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string - Optional Tracking URL
     */
    protected $_trackingURL = '';
    
    /**
     * @var string - Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    protected $_ip = '';
    
    /**
     * @var bool - Optional flag, if customerOrder is fetched by ERP System
     */
    protected $_isFetched = false;
    
    /**
     * @var string - Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    protected $_status = "new";
    
    /**
     * @var string - Date of creation
     */
    protected $_created = '';
    
    /**
     * @var string - Optional payment module id
     */
    protected $_paymentModuleId = '';
    
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
                case "_tracking":
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