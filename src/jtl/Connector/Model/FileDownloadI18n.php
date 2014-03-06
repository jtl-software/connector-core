<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownloadI18n Model
 * Localized fileDownload name and  description.
 *
 * @access public
 */
class FileDownloadI18n extends DataModel
{
    /**
     * @var string - Reference to fileDownloadId
     */
    protected $_fileDownloadId = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - File download title / name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional File download description
     */
    protected $_description = '';
    
    /**
     * FileDownloadI18n Setter
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
                case "_fileDownloadId":
                case "_localeName":
                case "_name":
                case "_description":
                
                    $this->$name = (string)$value;
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