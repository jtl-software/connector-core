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
class Image extends DataModel
{
    /**
     * @type string 
     */
    protected $filename = '';

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
     * @type integer 
     */
    protected $relationType = 0;

    /**
     * @type integer 
     */
    protected $sort = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
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
     * @param  Identity $id 
     * @return \jtl\Connector\Model\Image
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
     * @return \jtl\Connector\Model\Image
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
     * @param  Identity $masterImageId 
     * @return \jtl\Connector\Model\Image
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

    /**
     * @param  integer $relationType 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setRelationType($relationType)
    {
        return $this->setProperty('relationType', $relationType, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getRelationType()
    {
        return $this->relationType;
    }

    /**
     * @param  string $filename 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFilename($filename)
    {
        return $this->setProperty('filename', $filename, 'string');
    }
    
    /**
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param  integer $sort 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }
}

