<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * CustomerOrder Response Container Class
 * @access public
 */
class CustomerOrderContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrders;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderItems;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderItemVariations;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderPaymentInfos;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderShippingAddresses;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerOrderBillingAddresses;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrders()
    {
        return $this->customerOrders;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrder(Response $response)
    {
        if ($this->customerOrders === null) {
            $this->customerOrders = array();
        }
        
        $this->customerOrders[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderAttrs()
    {
        return $this->customerOrderAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderAttr(Response $response)
    {
        if ($this->customerOrderAttrs === null) {
            $this->customerOrderAttrs = array();
        }
        
        $this->customerOrderAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderItems()
    {
        return $this->customerOrderItems;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderItem(Response $response)
    {
        if ($this->customerOrderItems === null) {
            $this->customerOrderItems = array();
        }
        
        $this->customerOrderItems[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderItemVariations()
    {
        return $this->customerOrderItemVariations;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderItemVariation(Response $response)
    {
        if ($this->customerOrderItemVariations === null) {
            $this->customerOrderItemVariations = array();
        }
        
        $this->customerOrderItemVariations[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderPaymentInfos()
    {
        return $this->customerOrderPaymentInfos;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderPaymentInfo(Response $response)
    {
        if ($this->customerOrderPaymentInfos === null) {
            $this->customerOrderPaymentInfos = array();
        }
        
        $this->customerOrderPaymentInfos[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderShippingAddresses()
    {
        return $this->customerOrderShippingAddresses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderShippingAddress(Response $response)
    {
        if ($this->customerOrderShippingAddresses === null) {
            $this->customerOrderShippingAddresses = array();
        }
        
        $this->customerOrderShippingAddresses[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerOrderBillingAddresses()
    {
        return $this->customerOrderBillingAddresses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerOrderBillingAddress(Response $response)
    {
        if ($this->customerOrderBillingAddresses === null) {
            $this->customerOrderBillingAddresses = array();
        }
        
        $this->customerOrderBillingAddresses[] = $response;
    }
    
}