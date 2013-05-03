<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroup Model
 * @access public
 */
abstract class CustomerGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var double
     */
    protected $_discount;
    
    /**
     * @var string
     */
    protected $_default;
    
    /**
     * @var string
     */
    protected $_shopLogin;
    
    /**
     * @var int
     */
    protected $_shopNetPrice;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param double $discount
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    /**
     * @param string $default
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setDefault($default)
    {
        $this->_default = (string)$default;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->_default;
    }
    /**
     * @param string $shopLogin
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setShopLogin($shopLogin)
    {
        $this->_shopLogin = (string)$shopLogin;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShopLogin()
    {
        return $this->_shopLogin;
    }
    /**
     * @param int $shopNetPrice
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setShopNetPrice($shopNetPrice)
    {
        $this->_shopNetPrice = (int)$shopNetPrice;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShopNetPrice()
    {
        return $this->_shopNetPrice;
    }
}
?>