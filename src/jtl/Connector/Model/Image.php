
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
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected $foreignKey = '';


    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = '';


    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("imageRelationType")
     * @Serializer\Accessor(getter="getImageRelationType",setter="setImageRelationType")
     */
    protected $imageRelationType = '';



	public function __construct()
	{
	}
	
 
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
     * @param string $foreignKey 
     * @return \jtl\Connector\Model\Image
     */
    public function setForeignKey($foreignKey)
    {
        return $this->setProperty('foreignKey', $foreignKey, 'string');
    }

    /**
     * @return string 
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }
	
 
    /**
     * @param string $id 
     * @return \jtl\Connector\Model\Image
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'string');
    }

    /**
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
	
 
    /**
     * @param string $imageRelationType 
     * @return \jtl\Connector\Model\Image
     */
    public function setImageRelationType($imageRelationType)
    {
        return $this->setProperty('imageRelationType', $imageRelationType, 'string');
    }

    /**
     * @return string 
     */
    public function getImageRelationType()
    {
        return $this->imageRelationType;
    }


}
