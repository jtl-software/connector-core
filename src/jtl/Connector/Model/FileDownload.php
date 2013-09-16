<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownload Model
 * @access public
 */
class FileDownload extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_identificationString;
    
    /**
     * @var string
     */
    protected $_path;
    
    /**
     * @var string
     */
    protected $_previewPath;
    
    /**
     * @var int
     */
    protected $_maxDownloads;
    
    /**
     * @var int
     */
    protected $_maxDays;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * FileDownload Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_maxDownloads":
            case "_maxDays":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_identificationString":
            case "_path":
            case "_previewPath":
            case "_created":
            
                if (is_string($value) && strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
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