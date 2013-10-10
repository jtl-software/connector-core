<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * MediaFileAttr Model
 * @access public
 */
class MediaFileAttr extends DataModel
{
    /**
     * @var int
     */
    protected $_mediaFileAttr = 0;
    
    /**
     * @var string
     */
    protected $_mediaFileId = "0";
    
    /**
     * @var string
     */
    protected $_localeName = '';
    
    /**
     * @var string
     */
    protected $_name = '';
    
    /**
     * @var string
     */
    protected $_value = '';
    
    /**
     * MediaFileAttr Setter
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
                case "_mediaFileAttr":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_mediaFileId":
                case "_localeName":
                case "_name":
                case "_value":
                
                    $this->$name = (string)$value;
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