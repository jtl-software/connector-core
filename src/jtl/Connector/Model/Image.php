<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Image
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Image model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Image
 */
class Image extends DataModel
{
    /**
     * @var Identity Foreign key dependent on relationType
     */
    protected $foreignKey = null;

    /**
     * @var Identity Unique image id
     */
    protected $id = null;

    /**
     * @var Identity Reference to master imageId
     */
    protected $masterImageId = null;

    /**
     * @var string Filename or path
     */
    protected $filename = '';

    /**
     * @var string Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    protected $relationType = '';

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @param  Identity $foreignKey Foreign key dependent on relationType
     * @return \jtl\Connector\Model\Image
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey)
    {
        return $this->setProperty('foreignKey', $foreignKey, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterImageId(Identity $masterImageId)
    {
        return $this->setProperty('masterImageId', $masterImageId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFilename($filename)
    {
        return $this->setProperty('filename', $filename, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setRelationType($relationType)
    {
        return $this->setProperty('relationType', $relationType, 'string');
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

 
}
