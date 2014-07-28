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
class ManufacturerImage extends DataModel
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
     * @type integer|null 
     */
    protected $connectorId = 0;

    /**
     * @type Byte[] 
     */
    protected $data = null;

    /**
     * @type integer|null 
     */
    protected $size = 0;

    /**
     * @type integer|null 
     */
    protected $sort = 0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
        'foreignKey',
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
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ManufacturerImage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @param  Byte[] $data 
     * @return \jtl\Connector\Model\ManufacturerImage
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
     * @return \jtl\Connector\Model\ManufacturerImage
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
     * @param  integer $sort 
     * @return \jtl\Connector\Model\ManufacturerImage
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

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\ManufacturerImage
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
     * @return \jtl\Connector\Model\ManufacturerImage
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
}

