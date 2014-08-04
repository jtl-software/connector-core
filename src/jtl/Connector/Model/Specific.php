<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Specific extends DataModel
{
    /**
     * @type Identity Unique specific id
     */
    protected $id = null;

    /**
     * @type bool Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    protected $isGlobal = false;

    /**
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
     * @type string Specific type (radio, dropdown, image...)
     */
    protected $type = '';

    /**
     * @type \jtl\Connector\Model\SpecificValue[]
     */
    protected $values = array();

    /**
     * @type \jtl\Connector\Model\SpecificI18n[]
     */
    protected $i18ns = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique specific id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  bool $isGlobal Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsGlobal(Identity $isGlobal)
    {
        return $this->setProperty('IsGlobal', $isGlobal, 'bool');
    }

    /**
     * @return bool Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    public function getIsGlobal()
    {
        return $this->isGlobal;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\Specific
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

    /**
     * @param  string $type Specific type (radio, dropdown, image...)
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setType(Identity $type)
    {
        return $this->setProperty('Type', $type, 'string');
    }

    /**
     * @return string Specific type (radio, dropdown, image...)
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificValue $values
     * @return \jtl\Connector\Model\Specific
     */
    public function addValue(\jtl\Connector\Model\SpecificValue $value)
    {
        $this->values[] = $value;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SpecificValue[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return \jtl\Connector\Model\Specific
     */
    public function clearValues()
    {
        $this->values = array();
        return $this;
    }
    /**
     * @param  \jtl\Connector\Model\SpecificI18n $i18ns
     * @return \jtl\Connector\Model\Specific
     */
    public function addI18n(\jtl\Connector\Model\SpecificI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SpecificI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Specific
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
 
}
