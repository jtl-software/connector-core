<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @var Identity crossSellingGroup id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     */
    protected $description = '';

    /**
     * @var string Locale
     * @Serializer\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Localized name
     * @Serializer\Type("string")
     */
    protected $name = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id crossSellingGroup id
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity crossSellingGroup id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $description Optional localized description
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

    /**
     * @param  string $name Localized name
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
