<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Media file model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class MediaFile extends DataModel
{
    /**
     * @type Identity Unique MediaFile id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type string Optional media file category name
     */
    protected $_mediaFileCategory = '';

    /**
     * @type string File path
     */
    protected $_path = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
     * @type string Media file type e.g. "pdf"
     */
    protected $_type = '';

    /**
     * @type string Complete URL
     */
    protected $_url = '';

    /**
	 * Nav [MediaFile » One]
	 *
     * @type \jtl\Connector\Model\MediaFileI18n[]
     */
    protected $_i18ns = array();

    /**
	 * Nav [MediaFile » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();

    /**
	 * Nav [MediaFile » One]
	 *
     * @type \jtl\Connector\Model\MediaFileAttr[]
     */
    protected $_attrs = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productId',
	);

	/**
	 * @param  string $path File path
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setPath($path)
	{
		if (!is_string($path))
			throw new InvalidArgumentException('string expected.');
		$this->_path = $path;
		return $this;
	}
	
	/**
	 * @return string File path
	 */
	public function getPath()
	{
		return $this->_path;
	}

	/**
	 * @param  string $url Complete URL
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUrl($url)
	{
		if (!is_string($url))
			throw new InvalidArgumentException('string expected.');
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * @return string Complete URL
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * @param  string $mediaFileCategory Optional media file category name
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMediaFileCategory($mediaFileCategory)
	{
		if (!is_string($mediaFileCategory))
			throw new InvalidArgumentException('string expected.');
		$this->_mediaFileCategory = $mediaFileCategory;
		return $this;
	}
	
	/**
	 * @return string Optional media file category name
	 */
	public function getMediaFileCategory()
	{
		return $this->_mediaFileCategory;
	}

	/**
	 * @param  string $type Media file type e.g. "pdf"
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setType($type)
	{
		if (!is_string($type))
			throw new InvalidArgumentException('string expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return string Media file type e.g. "pdf"
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer Optional sort number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  Identity $id Unique MediaFile id
	 * @return \jtl\Connector\Model\MediaFile
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique MediaFile id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\MediaFile
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
	 * @param  \jtl\Connector\Model\MediaFileI18n $i18ns
	 * @return \jtl\Connector\Model\MediaFile
	 */
	public function addI18ns(\jtl\Connector\Model\MediaFileI18n $i18ns)
	{
		$this->_i18ns[] = $i18ns;
		return $this;
	}
	
	/**
	 * @return MediaFileI18n
	 */
	public function getI18ns()
	{
		return $this->_i18ns;
	}

	/**
	 * @return \jtl\Connector\Model\MediaFile
	 */
	public function clearI18ns()
	{
		$this->_i18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\MediaFile
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
	 * @return \jtl\Connector\Model\MediaFile
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\MediaFileAttr $attr
	 * @return \jtl\Connector\Model\MediaFile
	 */
	public function addAttr(\jtl\Connector\Model\MediaFileAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return MediaFileAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\MediaFile
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}
}

