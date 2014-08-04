<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Media file model..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MediaFile extends DataModel
{
    /**
     * @var Identity Unique MediaFile id
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @var string Optional media file category name
     */
    protected $mediaFileCategory = '';

    /**
     * @var string File path
     */
    protected $path = '';

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @var string Media file type e.g. "pdf"
     */
    protected $type = '';

    /**
     * @var string Complete URL
     */
    protected $url = '';

    /**
     * @var \jtl\Connector\Model\MediaFileI18n[]
     */
    protected $i18ns = array();

    /**
     * @var \jtl\Connector\Model\MediaFileAttr[]
     */
    protected $attributes = array();

    /**
     * @param  Identity $id Unique MediaFile id
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique MediaFile id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\MediaFile
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

    /**
     * @param  string $mediaFileCategory Optional media file category name
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMediaFileCategory($mediaFileCategory)
    {
        return $this->setProperty('mediaFileCategory', $mediaFileCategory, 'string');
    }

    /**
     * @return string Optional media file category name
     */
    public function getMediaFileCategory()
    {
        return $this->mediaFileCategory;
    }

    /**
     * @param  string $path File path
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPath($path)
    {
        return $this->setProperty('path', $path, 'string');
    }

    /**
     * @return string File path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $type Media file type e.g. "pdf"
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }

    /**
     * @return string Media file type e.g. "pdf"
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string $url Complete URL
     * @return \jtl\Connector\Model\MediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('url', $url, 'string');
    }

    /**
     * @return string Complete URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  \jtl\Connector\Model\MediaFileI18n $i18ns
     * @return \jtl\Connector\Model\MediaFile
     */
    public function addI18n(\jtl\Connector\Model\MediaFileI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\MediaFileI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\MediaFile
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
    /**
     * @param  \jtl\Connector\Model\MediaFileAttr $attributes
     * @return \jtl\Connector\Model\MediaFile
     */
    public function addAttribute(\jtl\Connector\Model\MediaFileAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\MediaFileAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\MediaFile
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }
 
}
