<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * MediaFileI18n Model
 * @access public
 */
abstract class MediaFileI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_mediaFileId = 0;
    
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * MediaFileI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_mediaFileId":
            
                $this->$name = (int)$value;
                break;
        
            case "_languageIso":
            case "_name":
            case "_description":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * MediaFileI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>