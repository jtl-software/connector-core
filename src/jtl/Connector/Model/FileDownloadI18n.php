<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownloadI18n Model
 * @access public
 */
abstract class FileDownloadI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_fileDownloadId;
    
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
     * FileDownloadI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_fileDownloadId":
            
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
     * FileDownloadI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>