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
abstract class MediaFileAttr extends DataModel
{
    /**
     * @var int
     */
    protected $_mediaFileAttr;
    
    /**
     * @var int
     */
    protected $_mediaFileId;
    
    /**
     * @var int
     */
    protected $_languageISO;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * MediaFileAttr Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_mediaFileAttr":
            case "_mediaFileId":
            case "_languageISO":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_value":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * MediaFileAttr Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>