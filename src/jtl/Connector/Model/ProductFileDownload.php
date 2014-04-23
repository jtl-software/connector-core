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
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var Identity Reference to fileDownload
     */
    protected $_fileDownloadId = null;
    
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
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param Identity $fileDownloadId Reference to fileDownload
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        $this->_fileDownloadId = $fileDownloadId;
        return $this;
    }
    
    /**
     * @return Identity Reference to fileDownload
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
}