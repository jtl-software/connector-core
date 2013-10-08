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
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_customerOrderId = '';
    
    /**
     * @var string
     */
    protected $_bankAccount = '';
    
    /**
     * @var string
     */
    protected $_bankCode = '';
    
    /**
     * @var string
     */
    protected $_accountHolder = '';
    
    /**
     * @var string
     */
    protected $_accountNumber = '';
    
    /**
     * @var string
     */
    protected $_iban = '';
    
    /**
     * @var string
     */
    protected $_bic = '';
    
    /**
     * @var string
     */
    protected $_creditCardNumber = '';
    
    /**
     * @var string
     */
    protected $_creditCardVerificationNumber = '';
    
    /**
     * @var string
     */
    protected $_creditCardExpiration = '';
    
    /**
     * @var string
     */
    protected $_creditCardType = '';
    
    /**
     * @var string
     */
    protected $_creditCardHolder = '';
    
    /**
     * CustomerOrderPaymentInfo Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_customerOrderId":
            case "_bankAccount":
            case "_bankCode":
            case "_accountHolder":
            case "_accountNumber":
            case "_iban":
            case "_bic":
            case "_creditCardNumber":
            case "_creditCardVerificationNumber":
            case "_creditCardExpiration":
            case "_creditCardType":
            case "_creditCardHolder":
            
                $this->$name = (string)$value;
                break;
        
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