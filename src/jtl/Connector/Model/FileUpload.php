<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileUpload Model
 * File upload model
 *
 * @access public
 */
class FileUpload extends DataModel
{
    /**
     * @var string - Unique fileUpload id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * @var string - Filename
     */
    protected $_name = '';
    
    /**
     * @var string - File description
     */
    protected $_description = '';
    
    /**
     * @var string - Allowed file type
     */
    protected $_fileType = '';
    
    /**
     * @var bool - True if file upload is required to buy product
     */
    protected $_isRequired = false;
    
    /**
     * FileUpload Setter
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
                case "_productId":
                case "_name":
                case "_description":
                case "_fileType":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isRequired":
                
                    $this->$name = (bool)$value;
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