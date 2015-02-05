
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
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroup extends DataModel
{

    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';


    /**
     * @var string crossSellingGroup id
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = '';


    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';


    /**
     * @var string Localized name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';



	public function __construct()
	{
	}
	
 
    /**
     * @param string $description Optional localized description
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional localized description
     */
    public function getDescription()
    {
        return $this->description;
    }
	
 
    /**
     * @param string $id crossSellingGroup id
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'string');
    }

    /**
     * @return string crossSellingGroup id
     */
    public function getId()
    {
        return $this->id;
    }
	
 
    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }
	
 
    /**
     * @param string $name Localized name
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }


}
