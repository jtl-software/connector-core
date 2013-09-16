<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * EmailTemplate Model
 * @access public
 */
class EmailTemplate extends DataModel
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
    protected $_description;
    
    /**
     * @var string
     */
    protected $_emailType;
    
    /**
     * @var string
     */
    protected $_moduleId;
    
    /**
     * @var string
     */
    protected $_filename;
    
    /**
     * @var bool
     */
    protected $_isActive;
    
    /**
     * @var bool
     */
    protected $_isOii;
    
    /**
     * @var bool
     */
    protected $_isAgb;
    
    /**
     * @var bool
     */
    protected $_isWrb;
    
    /**
     * @var int
     */
    protected $_error;
    
    /**
     * EmailTemplate Setter
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
            case "_error":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_description":
            case "_emailType":
            case "_moduleId":
            case "_filename":
            
                if (is_string($value) && strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_isActive":
            case "_isOii":
            case "_isAgb":
            case "_isWrb":
            
                if (is_bool($value)) {
                    $this->$name = (bool)$value;
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