<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerGroup Model
 * @access public
 */
abstract class CustomerGroup extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_discount;
    
    /**
     * @var string
     */
    protected $_default;
    
    /**
     * @var 
     */
    protected $_shopLogin;
    
    /**
     * @var 
     */
    protected $_shopNetPrice;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $discount
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (string)$discount;
        return $this;
    }
    
    /**
     * @return string
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
     * @param  $shopLogin
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setShopLogin($shopLogin)
    {
        $this->_shopLogin = ()$shopLogin;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShopLogin()
    {
        return $this->_shopLogin;
    }
    
    /**
     * @param  $shopNetPrice
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setShopNetPrice($shopNetPrice)
    {
        $this->_shopNetPrice = ()$shopNetPrice;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShopNetPrice()
    {
        return $this->_shopNetPrice;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerGroup/CustomerGroup.json", $this->getPublic(array()));
    }
}
?>