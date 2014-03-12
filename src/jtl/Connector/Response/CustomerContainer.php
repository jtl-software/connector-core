<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Customer Response Container Class
 * @access public
 */
class CustomerContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customers;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerAttrs;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomers()
    {
        return $this->customers;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomer(Response $response)
    {
        if ($this->customers === null) {
            $this->customers = array();
        }
        
        $this->customers[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerAttrs()
    {
        return $this->customerAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerAttr(Response $response)
    {
        if ($this->customerAttrs === null) {
            $this->customerAttrs = array();
        }
        
        $this->customerAttrs[] = $response;
    }
    
}