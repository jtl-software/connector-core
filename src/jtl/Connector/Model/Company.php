<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Company Model
 * @access public
 */
class Company extends DataModel
{
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_businessman;
    
    /**
     * @var string
     */
    protected $_street;
    
    /**
     * @var string
     */
    protected $_streetNumber;
    
    /**
     * @var string
     */
    protected $_zipCode;
    
    /**
     * @var string
     */
    protected $_city;
    
    /**
     * @var string
     */
    protected $_country;
    
    /**
     * @var string
     */
    protected $_phone;
    
    /**
     * @var string
     */
    protected $_fax;
    
    /**
     * @var string
     */
    protected $_eMail;
    
    /**
     * @var string
     */
    protected $_www;
    
    /**
     * @var string
     */
    protected $_bankCode;
    
    /**
     * @var string
     */
    protected $_accountNumber;
    
    /**
     * @var string
     */
    protected $_bankAccount;
    
    /**
     * @var string
     */
    protected $_accountHolder;
    
    /**
     * @var string
     */
    protected $_vatNumber;
    
    /**
     * @var string
     */
    protected $_taxIdNumber;
    
    /**
     * @var string
     */
    protected $_iban;
    
    /**
     * @var string
     */
    protected $_bic;
    
    /**
     * Company Setter
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
            case "_name":
            case "_businessman":
            case "_street":
            case "_streetNumber":
            case "_zipCode":
            case "_city":
            case "_country":
            case "_phone":
            case "_fax":
            case "_eMail":
            case "_www":
            case "_bankCode":
            case "_accountNumber":
            case "_bankAccount":
            case "_accountHolder":
            case "_vatNumber":
            case "_taxIdNumber":
            case "_iban":
            case "_bic":
            
                if (is_string($value) && strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
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