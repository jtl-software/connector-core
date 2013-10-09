<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigGroup Model
 * @access public
 */
class ConfigGroup extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_imagePath = '';
    
    /**
     * @var int
     */
    protected $_minimumSelection = 0;
    
    /**
     * @var int
     */
    protected $_maximumSelection = 0;
    
    /**
     * @var int
     */
    protected $_type = 0;
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * @var string
     */
    protected $_comment = '';
    
    /**
     * ConfigGroup Setter
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
                case "_imagePath":
                case "_comment":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_minimumSelection":
                case "_maximumSelection":
                case "_type":
                case "_sort":
                
                    $this->$name = (int)$value;
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