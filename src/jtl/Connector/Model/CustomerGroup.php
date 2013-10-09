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
class CustomerGroup extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_name = '';
    
    /**
     * @var double
     */
    protected $_discount = 0.0;
    
    /**
     * @var bool
     */
    protected $_isDefault = false;
    
    /**
     * @var bool
     */
    protected $_applyNetPrice = False;
    
    /**
     * CustomerGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_applyNetPrice":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
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