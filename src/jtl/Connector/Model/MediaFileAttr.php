<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual mediafile attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class MediaFileAttr extends DataModel
{
    /**
     * @type Identity Unique MediaFileAttr id
     */
    public $_id = null;

    /**
     * @type Identity Reference to mediaFile
     */
    public $_mediaFileId = null;

    /**
     * @type string Attribute name
     */
    public $_key = '';

    /**
     * @type string Locale
     */
    public $_localeName = '';

    /**
     * @type string Attribute value
     */
    public $_value = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_mediaFileId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
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
     * @param  string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('_key', $key, 'string');
    }
    
    /**
     * @return string Attribute name
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('_value', $value, 'string');
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param  Identity $id Unique MediaFileAttr id
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique MediaFileAttr id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMediaFileId(Identity $mediaFileId)
    {
        return $this->setProperty('_mediaFileId', $mediaFileId, 'Identity');
    }
    
    /**
     * @return Identity Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->_mediaFileId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('_localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
}

