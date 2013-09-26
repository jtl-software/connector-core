<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * MediaFile Model
 * @access public
 */
class MediaFile extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_productId = 0;
    
    /**
     * @var string
     */
    protected $_path = '';
    
    /**
     * @var string
     */
    protected $_url = '';
    
    /**
     * @var string
     */
    protected $_mediaFileCategory = '';
    
    /**
     * @var string
     */
    protected $_type = '';
    
    /**
     * @var int
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
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_productId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_path":
            case "_url":
            case "_mediaFileCategory":
            case "_type":
            
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