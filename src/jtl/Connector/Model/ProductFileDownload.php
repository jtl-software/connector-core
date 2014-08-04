<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Product to FileDownload allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductFileDownload extends DataModel
{
    /**
     * @var Identity Reference to fileDownload
     */
    protected $fileDownloadId = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @param  Identity $fileDownloadId Reference to fileDownload
     * @return \jtl\Connector\Model\ProductFileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('fileDownloadId', $fileDownloadId, 'Identity');
    }

    /**
     * @return Identity Reference to fileDownload
     */
    public function getFileDownloadId()
    {
        return $this->fileDownloadId;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductFileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
