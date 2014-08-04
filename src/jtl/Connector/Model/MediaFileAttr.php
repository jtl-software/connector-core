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
     * @param  Identity $id Unique MediaFileAttr id
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
        return $this->setProperty('MediaFileId', $mediaFileId, 'Identity');
    }

    /**
     * @return Identity Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->mediaFileId;
    }

    /**
     * @param  string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setKey(Identity $key)
    {
        return $this->setProperty('Key', $key, 'string');
    }

    /**
     * @return string Attribute name
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setValue(Identity $value)
    {
        return $this->setProperty('Value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}
