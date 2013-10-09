<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Image Model
 * @access public
 */
class Image extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_masterImageId = '';
    
    /**
     * @var string
     */
    protected $_relationType = "product";
    
    /**
     * @var int
     */
    protected $_foreignKey = 0;
    
    /**
     * @var string
     */
    protected $_filename = '';
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * Image Setter
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
                case "_masterImageId":
                case "_relationType":
                case "_filename":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_foreignKey":
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