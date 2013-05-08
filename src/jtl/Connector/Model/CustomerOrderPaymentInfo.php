<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPaymentInfo Model
 * @access public
 */
abstract class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var int
     */
    protected $_shippingMethodId;
    
    /**
     * @var int
     */
    protected $_basketId;
    
    /**
     * @var string
     */
    protected $_bankAccount;
    
    /**
     * @var string
     */
    protected $_bankCode;
    
    /**
     * @var string
     */
    protected $_accountHolder;
    
    /**
     * @var string
     */
    protected $_accountNumber;
    
    /**
     * @var string
     */
    protected $_iban;
    
    /**
     * @var string
     */
    protected $_bic;
    
    /**
     * @var string
     */
    protected $_creditCardNumber;
    
    /**
     * @var string
     */
    protected $_cvv;
    
    /**
     * CustomerOrderPaymentInfo Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_shippingMethodId":
            case "_basketId":
            
                $this->$name = (int)$value;
                break;
        
            case "_bankAccount":
            case "_bankCode":
            case "_accountHolder":
            case "_accountNumber":
            case "_iban":
            case "_bic":
            case "_creditCardNumber":
            case "_cvv":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * CustomerOrderPaymentInfo Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>