<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * CustomerOrder Container Class
 * @access public
 */
class CustomerOrderContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\CustomerOrder[]
     */
    protected $_customerOrders;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderAttr[]
     */
    protected $_customerOrderAttrs;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderPosition[]
     */
    protected $_customerOrderPositions;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderPositionVariation[]
     */
    protected $_customerOrderPositionVariations;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    protected $_customerOrderPaymentInfos;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    protected $_customerOrderShippingAddresses;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    protected $_customerOrderBillingAddresses;
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrder
     */
    public function getCustomerOrders()
    {
        return $this->_customerOrders;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderAttr
     */
    public function getCustomerOrderAttrs()
    {
        return $this->_customerOrderAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderPosition
     */
    public function getCustomerOrderPositions()
    {
        return $this->_customerOrderPositions;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderPositionVariation
     */
    public function getCustomerOrderPositionVariations()
    {
        return $this->_customerOrderPositionVariations;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function getCustomerOrderPaymentInfos()
    {
        return $this->_customerOrderPaymentInfos;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function getCustomerOrderShippingAddresses()
    {
        return $this->_customerOrderShippingAddresses;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderBillingAddress
     */
    public function getCustomerOrderBillingAddresses()
    {
        return $this->_customerOrderBillingAddresses;
    }
        
    public $items = array(
        "customer_order" => array("CustomerOrder", "CustomerOrders"),
        "customer_order_attr" => array("CustomerOrderAttr", "CustomerOrderAttrs"),
        "customer_order_position" => array("CustomerOrderPosition", "CustomerOrderPositions"),
        "customer_order_position_variation" => array("CustomerOrderPositionVariation", "CustomerOrderPositionVariations"),
        "customer_order_payment_info" => array("CustomerOrderPaymentInfo", "CustomerOrderPaymentInfos"),
        "customer_order_shipping_address" => array("CustomerOrderShippingAddress", "CustomerOrderShippingAddresses"),
        "customer_order_billing_address" => array("CustomerOrderBillingAddress", "CustomerOrderBillingAddresses")
    );
}
?>