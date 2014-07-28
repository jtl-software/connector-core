<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductImage extends DataModel
{
    /**
     * @type Identity 
     */
    protected $foreignKey = null;

    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type Identity 
     */
    protected $masterImageId = null;

    /**
     * @type string 
     */
    protected $cAufloesung = '';

    /**
     * @type string 
     */
    protected $cHash = '';

    /**
     * @type DateTime|null 
     */
    protected $dAenderungsdatum = null;

    /**
     * @type Byte[] 
     */
    protected $data = null;

    /**
     * @type boolean 
     */
    protected $flagDelete = false;

    /**
     * @type boolean 
     */
    protected $flagUpdate = false;

    /**
     * @type string 
     */
    protected $modified = '';

    /**
     * @type integer|null 
     */
    protected $size = 0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
        'foreignKey',
        'masterImageId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  Byte[] $data 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
     */
    public function setData(Byte[] $data)
    {
        return $this->setProperty('data', $data, 'Byte[]');
    }
    
    /**
     * @return Byte[] 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param  integer $size 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSize($size)
    {
        return $this->setProperty('size', $size, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param  string $modified 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setModified($modified)
    {
        return $this->setProperty('modified', $modified, 'string');
    }
    
    /**
     * @return string 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param  DateTime $dAenderungsdatum 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDAenderungsdatum(DateTime $dAenderungsdatum)
    {
        return $this->setProperty('dAenderungsdatum', $dAenderungsdatum, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDAenderungsdatum()
    {
        return $this->dAenderungsdatum;
    }

    /**
     * @param  string $cHash 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCHash($cHash)
    {
        return $this->setProperty('cHash', $cHash, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCHash()
    {
        return $this->cHash;
    }

    /**
     * @param  string $cAufloesung 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAufloesung($cAufloesung)
    {
        return $this->setProperty('cAufloesung', $cAufloesung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAufloesung()
    {
        return $this->cAufloesung;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $foreignKey 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey)
    {
        return $this->setProperty('foreignKey', $foreignKey, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }

    /**
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->flagDelete;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->flagUpdate;
    }

    /**
     * @param  Identity $masterImageId 
     * @return \jtl\Connector\Model\ProductImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterImageId(Identity $masterImageId)
    {
        return $this->setProperty('masterImageId', $masterImageId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getMasterImageId()
    {
        return $this->masterImageId;
    }
}

