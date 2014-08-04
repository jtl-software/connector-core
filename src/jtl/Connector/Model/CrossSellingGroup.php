<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @type Identity crossSellingGroup id
     */
    protected $id = null;

    /**
     * @type string Optional localized description
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id crossSellingGroup id
     * @return \jtl\Connector\Model\CrossSellingGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
