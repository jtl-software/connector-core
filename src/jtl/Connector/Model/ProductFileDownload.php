<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Product to FileDownload allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductFileDownload extends DataModel
{
    /**
     * @type Identity Reference to fileDownload
     */
    protected $_fileDownloadId = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
	 * Nav [ProductFileDownload » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productId',
		'_fileDownloadId',
	);

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductFileDownload
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
	 * @param  Identity $fileDownloadId Reference to fileDownload
	 * @return \jtl\Connector\Model\ProductFileDownload
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductFileDownload
	 */
	public function addProduct(\jtl\Connector\Model\Product $product)
	{
		$this->_product[] = $product;
		return $this;
	}
	
	/**
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->_product;
	}

	/**
	 * @return \jtl\Connector\Model\ProductFileDownload
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

