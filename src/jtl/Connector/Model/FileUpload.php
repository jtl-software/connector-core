<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileUpload Model
 * @access public
 */
abstract class FileUpload extends DataModel
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
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_fileType;
    
    /**
     * @var int
     */
    protected $_required;
    
    /**
     * FileUpload Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_productId":
            case "_required":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_description":
            case "_fileType":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * FileUpload Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>