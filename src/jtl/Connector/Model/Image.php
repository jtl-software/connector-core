<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Image model..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Image extends DataModel
{
    /**
     * @type Identity Foreign key dependent on relationType
     */
    protected $foreignKey = null;

    /**
     * @type Identity Unique image id
     */
    protected $id = null;

    /**
     * @type Identity Reference to master imageId
     */
    protected $masterImageId = null;

    /**
     * @type string Filename or path
     */
    protected $filename = '';

    /**
     * @type string Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    protected $relationType = '';

    /**
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'foreignKey',
        'id',
        'masterImageId',
    );

    /**
     * @param  Identity $foreignKey Foreign key dependent on relationType
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey)
    {
        return $this->setProperty('ForeignKey', $foreignKey, 'Identity');
    }

    /**
     * @return Identity Foreign key dependent on relationType
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }

    /**
     * @param  Identity $id Unique image id
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique image id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $masterImageId Reference to master imageId
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterImageId(Identity $masterImageId)
    {
        return $this->setProperty('MasterImageId', $masterImageId, 'Identity');
    }

    /**
     * @return Identity Reference to master imageId
     */
    public function getMasterImageId()
    {
        return $this->masterImageId;
    }

    /**
     * @param  string $filename Filename or path
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFilename(Identity $filename)
    {
        return $this->setProperty('Filename', $filename, 'string');
    }

    /**
     * @return string Filename or path
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param  string $relationType Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setRelationType(Identity $relationType)
    {
        return $this->setProperty('RelationType', $relationType, 'string');
    }

    /**
     * @return string Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    public function getRelationType()
    {
        return $this->relationType;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

 
}
