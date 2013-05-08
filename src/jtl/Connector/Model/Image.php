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
abstract class Image extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_relationType;
    
    /**
     * @var int
     */
    protected $_foreignKey;
    
    /**
     * @var bool
     */
    protected $_isMainImage;
    
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
            case "_foreignKey":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_relationType":
            case "_filename":
            
                $this->$name = (string)$value;
                break;
        
            case "_isMainImage":
            
                $this->$name = (bool)$value;
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
}
?>