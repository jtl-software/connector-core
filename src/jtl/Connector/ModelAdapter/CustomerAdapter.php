<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

/**
 * Customer Adapter Class
 * @access public
 */
class CustomerAdapter extends CoreAdapter
{
    /**
     * @var \jtl\Connector\Model\customer
     */
    protected $_customer;
    
    /**
     * @var \jtl\Connector\Model\customerAttr
     */
    protected $_customerAttr;
        
    /**
     * @return \jtl\Connector\Model\customer
     */
    public function getCustomer()
    {
        return $this->_customer;
    }    
    /**
     * @return \jtl\Connector\Model\customerAttr
     */
    public function getCustomerAttr()
    {
        return $this->_customerAttr;
    }
    
    public $items = array(
        "customer" => "Customer",
        "customerattr" => "CustomerAttr"
    );
}
?>