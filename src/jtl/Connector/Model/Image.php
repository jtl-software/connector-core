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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_masterImageId;
    
    /**
     * @var string
     */
    protected $_relationType = "product";
    
    /**
     * @var int
     */
    protected $_foreignKey;
    
    /**
     * @var string
     */
    protected $_filename;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * Image Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_masterImageId":
            case "_foreignKey":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_relationType":
            case "_filename":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * Image Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
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