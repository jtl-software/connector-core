<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
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
    public $_id = null;

    /**
     * @type Identity Reference to product
     */
    public $_productId = null;

    /**
     * @type string Optional media file category name
     */
    public $_mediaFileCategory = '';

    /**
     * @type string File path
     */
    public $_path = '';

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * @type string Media file type e.g. "pdf"
     */
    public $_type = '';

    /**
     * @type string Complete URL
     */
    public $_url = '';

    /**
     * Nav [MediaFile » One]
     *
     * @type \jtl\Connector\Model\MediaFileI18n[]
     */
    public $_i18ns = array();

    /**
     * Nav [MediaFile » One]
     *
     * @type \jtl\Connector\Model\MediaFileAttr[]
     */
    public $_attributes = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_i18ns' => '\jtl\Connector\Model\MediaFileI18n',
        '_attributes' => '\jtl\Connector\Model\MediaFileAttr',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $path File path
     * @return \jtl\Connector\Model\MediaFile
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPath($path)
    {
        return $this->setProperty('_path', $path, 'string');
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
        return $this->setProperty('_url', $url, 'string');
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
        return $this->setProperty('_mediaFileCategory', $mediaFileCategory, 'string');
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
        return $this->setProperty('_type', $type, 'string');
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
        return $this->setProperty('_sort', $sort, 'integer');
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
        return $this->setProperty('_id', $id, 'Identity');
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
        return $this->setProperty('_productId', $productId, 'Identity');
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
     * @param  \jtl\Connector\Model\MediaFileAttr $attribute
     * @return \jtl\Connector\Model\MediaFile
     */
    public function addAttribute(\jtl\Connector\Model\MediaFileAttr $attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return MediaFileAttr
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return \jtl\Connector\Model\MediaFile
     */
    public function clearAttributes()
    {
        $this->_attributes = array();
        return $this;
    }
}

