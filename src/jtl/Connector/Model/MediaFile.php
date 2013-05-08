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
abstract class MediaFile extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_path;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_mediaFileCategory;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * MediaFile Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
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
     * MediaFile Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>