<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * @access public
 */
class Currency extends DataModel
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
     * @var string
     */
    protected $_iso;
    
    /**
     * @var string
     */
    protected $_nameHtml;
    
    /**
     * @var double
     */
    protected $_factor;
    
    /**
     * @var string
     */
    protected $_default = "False";
    
    /**
     * @var string
     */
    protected $_currencySignBeforeValue = "False";
    
    /**
     * @var string
     */
    protected $_delimiterCent = ",";
    
    /**
     * @var string
     */
    protected $_delimiterThousand = ".";
    
    /**
     * Currency Setter
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
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
                break;
        
            case "_name":
            case "_iso":
            case "_nameHtml":
            case "_default":
            case "_currencySignBeforeValue":
            case "_delimiterCent":
            case "_delimiterThousand":
            
                if (strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_factor":
            
                if (is_numeric($value)) {
                    $this->$name = (double)$value;                
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