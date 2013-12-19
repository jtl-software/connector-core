<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * MediaFile Model
 * Media file model
 *
 * @access public
 */
class MediaFile extends DataModel
{
    /**
     * @var string - Unique MediaFile id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * @var string - File path
     */
    protected $_path = '';
    
    /**
     * @var string - Complete URL
     */
    protected $_url = '';
    
    /**
     * @var string - Category name
     */
    protected $_mediaFileCategory = '';
    
    /**
     * @var string - Media file type e.g. "pdf"
     */
    protected $_type = '';
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * MediaFile Setter
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
                case "_productId":
                case "_path":
                case "_url":
                case "_mediaFileCategory":
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
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