<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Locale specific mediafile name + description..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MediaFileI18n extends DataModel
{
    /**
     * @type Identity Reference to mediaFile
     */
    protected $mediaFileId = null;

    /**
     * @type string Locale specific description
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Locale specific name
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'mediaFileId',
    );

    /**
     * @param  string $name Locale specific name
     * @return \jtl\Connector\Model\MediaFileI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Locale specific name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $description Locale specific description
     * @return \jtl\Connector\Model\MediaFileI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }
    
    /**
     * @return string Locale specific description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @return \jtl\Connector\Model\MediaFileI18n
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

