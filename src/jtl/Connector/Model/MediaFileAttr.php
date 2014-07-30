<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Monolingual mediafile attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MediaFileAttr extends DataModel
{
    /**
     * @type Identity Unique MediaFileAttr id
     */
    protected $id = null;

    /**
     * @type Identity Reference to mediaFile
     */
    protected $mediaFileId = null;

    /**
     * @type string Attribute name
     */
    protected $key = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Attribute value
     */
    protected $value = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'mediaFileId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'key' => 'string',
        'value' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
        'mediaFileId' => '\jtl\Connector\Model\Identity',
        'localeName' => 'string',
    );


    /**
     * @param  string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
    }
    
    /**
     * @return string Attribute name
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param  Identity $id Unique MediaFileAttr id
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique MediaFileAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMediaFileId(Identity $mediaFileId)
    {
        return $this->setProperty('mediaFileId', $mediaFileId, 'Identity');
    }
    
    /**
     * @return Identity Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->mediaFileId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}

