<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class Image extends DataModel
{
    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("filename")
     * @Serializer\Accessor(getter="getFilename",setter="setFilename")
     */
    protected $filename = '';

    /**
     * @var integer 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected $foreignKey = 0;

    /**
     * @var integer 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = 0;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("relationType")
     * @Serializer\Accessor(getter="getRelationType",setter="setRelationType")
     */
    protected $relationType = '';


    /**
     * @param string $filename 
     * @return \jtl\Connector\Model\Image
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
     * @param integer $foreignKey 
     * @return \jtl\Connector\Model\Image
     * @throws \InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setForeignKey(integer $foreignKey)
    {
        return $this->setProperty('foreignKey', $foreignKey, 'integer');
    }

    /**
     * @return integer 
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }

    /**
     * @param integer $id 
     * @return \jtl\Connector\Model\Image
     * @throws \InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setId(integer $id)
    {
        return $this->setProperty('id', $id, 'integer');
    }

    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $relationType 
     * @return \jtl\Connector\Model\Image
     */
    public function setRelationType($relationType)
    {
        return $this->setProperty('relationType', $relationType, 'string');
    }

    /**
     * @return string 
     */
    public function getRelationType()
    {
        return $this->relationType;
    }
}
