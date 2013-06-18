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
     * @var \jtl\Connector\Model\customerOrder[]
     */
    protected $_customerOrders;
    
    /**
     * @var \jtl\Connector\Model\customerOrderAttr[]
     */
    protected $_customerOrderAttrs;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPosition[]
     */
    protected $_customerOrderPositions;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPositionVariation[]
     */
    protected $_customerOrderPositionVariations;
    
    /**
     * @var \jtl\Connector\Model\customerOrderPaymentInfo[]
     */
    protected $_customerOrderPaymentInfos;
    
    /**
     * @var \jtl\Connector\Model\customerOrderShippingAddress[]
     */
    protected $_customerOrderShippingAddresss;
    
    /**
     * @var \jtl\Connector\Model\customerOrderBillingAddress[]
     */
    protected $_customerOrderBillingAddresss;
        
    /**
     * @return array \jtl\Connector\Model\customerOrder
     */
    public function getCustomerOrders()
    {
        return $this->_customerOrders;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderAttr
     */
    public function getCustomerOrderAttrs()
    {
        return $this->_customerOrderAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderPosition
     */
    public function getCustomerOrderPositions()
    {
        return $this->_customerOrderPositions;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderPositionVariation
     */
    public function getCustomerOrderPositionVariations()
    {
        return $this->_customerOrderPositionVariations;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderPaymentInfo
     */
    public function getCustomerOrderPaymentInfos()
    {
        return $this->_customerOrderPaymentInfos;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderShippingAddress
     */
    public function getCustomerOrderShippingAddresss()
    {
        return $this->_customerOrderShippingAddresss;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerOrderBillingAddress
     */
    public function getCustomerOrderBillingAddresss()
    {
        return $this->_customerOrderBillingAddresss;
    }
        
    public $items = array(
        "customerorder" => array("CustomerOrder", "CustomerOrders"),
        "customerorderattr" => array("CustomerOrderAttr", "CustomerOrderAttrs"),
        "customerorderposition" => array("CustomerOrderPosition", "CustomerOrderPositions"),
        "customerorderpositionvariation" => array("CustomerOrderPositionVariation", "CustomerOrderPositionVariations"),
        "customerorderpaymentinfo" => array("CustomerOrderPaymentInfo", "CustomerOrderPaymentInfos"),
        "customerordershippingaddress" => array("CustomerOrderShippingAddress", "CustomerOrderShippingAddresss"),
        "customerorderbillingaddress" => array("CustomerOrderBillingAddress", "CustomerOrderBillingAddresss")
    );
}
?>