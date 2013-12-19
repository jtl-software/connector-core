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
     * @var \jtl\Connector\Model\CustomerOrderItem[]
     */
    protected $_customerOrderItems;
    
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
    protected $_customerOrderShippingAddresss;
    
    /**
     * @var \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    protected $_customerOrderBillingAddresss;
        
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
     * @return array \jtl\Connector\Model\CustomerOrderItem
     */
    public function getCustomerOrderItems()
    {
        return $this->_customerOrderItems;
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
    public function getCustomerOrderShippingAddresss()
    {
        return $this->_customerOrderShippingAddresss;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerOrderBillingAddress
     */
    public function getCustomerOrderBillingAddresss()
    {
        return $this->_customerOrderBillingAddresss;
    }
        
    public $items = array(
        "customer_order" => array("CustomerOrder", "CustomerOrders"),
        "customer_order_attr" => array("CustomerOrderAttr", "CustomerOrderAttrs"),
        "customer_order_item" => array("CustomerOrderItem", "CustomerOrderItems"),
        "customer_order_position_variation" => array("CustomerOrderPositionVariation", "CustomerOrderPositionVariations"),
        "customer_order_payment_info" => array("CustomerOrderPaymentInfo", "CustomerOrderPaymentInfos"),
        "customer_order_shipping_address" => array("CustomerOrderShippingAddress", "CustomerOrderShippingAddresss"),
        "customer_order_billing_address" => array("CustomerOrderBillingAddress", "CustomerOrderBillingAddresss")
    );
}
?>