<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductFileDownload Model
 * @access public
 */
class ProductFileDownload extends DataModel
{
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_fileDownloadId;
    
    /**
     * ProductFileDownload Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_productId":
            case "_fileDownloadId":
            
                $this->$name = (int)$value;
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