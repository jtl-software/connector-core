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
     * @type boolean 
     */
    protected $isGlobal = false;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * @type string Specific type (radio, dropdown, image...)
     */
    protected $type = '';

    /**
     * Nav [Specific » One]
     *
     * @type \jtl\Connector\Model\SpecificI18n[]
     */
    protected $i18ns = array();

    /**
     * Nav [Specific » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\SpecificValue[]
     */
    protected $values = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'i18ns' => '\jtl\Connector\Model\SpecificI18n',
        'values' => '\jtl\Connector\Model\SpecificValue',
    );


    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $type Specific type (radio, dropdown, image...)
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }
    
    /**
     * @return string Specific type (radio, dropdown, image...)
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  Identity $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique specific id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  boolean $isGlobal 
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsGlobal($isGlobal)
    {
        return $this->setProperty('isGlobal', $isGlobal, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsGlobal()
    {
        return $this->isGlobal;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificI18n $i18n
     * @return \jtl\Connector\Model\Specific
     */
    public function addI18n(\jtl\Connector\Model\SpecificI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return SpecificI18n
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

    /**
     * @param  \jtl\Connector\Model\SpecificValue $value
     * @return \jtl\Connector\Model\Specific
     */
    public function addValue(\jtl\Connector\Model\SpecificValue $value)
    {
        $this->values[] = $value;
        return $this;
    }
    
    /**
     * @return SpecificValue
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
}

