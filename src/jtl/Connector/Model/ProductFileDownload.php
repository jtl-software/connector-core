<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product to FileDownload allocation.
 *
 * @access public
 * @subpackage Product
 */
class ProductFileDownload extends DataModel
{
    /**
     * @var string Reference to product
     */
    protected $_productId = '';             
    
    /**
     * @var string Reference to fileDownload
     */
    protected $_fileDownloadId = '';             
    
    /**
     * ProductFileDownload Setter
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
                case "_productId":
                case "_fileDownloadId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $fileDownloadId Reference to fileDownload
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setFileDownloadId($fileDownloadId)
    {
        $this->_fileDownloadId = (string)$fileDownloadId;
        return $this;
    }
    
    /**
     * @return string Reference to fileDownload
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
}