<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownload Model
 * File download properties. 
 *
 * @access public
 */
class FileDownload extends DataModel
{
    /**
     * @var string - Unique fileDownload id
     */
    protected $_id = '';
    
    /**
     * @var string - Path to download file
     */
    protected $_path = '';
    
    /**
     * @var string - Optional path to preview file
     */
    protected $_previewPath = '';
    
    /**
     * @var int - Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $_maxDownloads = 0;
    
    /**
     * @var int - Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $_maxDays = 0;
    
    /**
     * @var int - Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var string - Optional creation date
     */
    protected $_created = '';
    
    /**
     * FileDownload Setter
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
                case "_path":
                case "_previewPath":
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_maxDownloads":
                case "_maxDays":
                case "_sort":
                
                    $this->$name = (int)$value;
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