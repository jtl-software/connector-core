<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product to FileDownload allocation.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductFileDownload extends DataModel
{
    /**
     * @var Identity Reference to fileDownload
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("fileDownloadId")
     * @Serializer\Accessor(getter="getFileDownloadId",setter="setFileDownloadId")
     */
    protected $fileDownloadId = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productId = new Identity();
        $this->fileDownloadId = new Identity();
    }

    /**
     * @param Identity $fileDownloadId Reference to fileDownload
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
     * @param Identity $productId Reference to product
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
