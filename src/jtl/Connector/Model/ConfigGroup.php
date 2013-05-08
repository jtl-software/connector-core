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
abstract class ConfigGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_imagePath;
    
    /**
     * @var int
     */
    protected $_minimumSelection;
    
    /**
     * @var int
     */
    protected $_maximumSelection;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_comment;
    
    /**
     * ConfigGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_minimumSelection":
            case "_maximumSelection":
            case "_type":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_imagePath":
            case "_comment":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ConfigGroup Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>