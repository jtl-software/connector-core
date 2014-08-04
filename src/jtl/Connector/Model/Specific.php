<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Specific
 */
class Specific extends DataModel
{
    /**
     * @var Identity Unique specific id
     */
    protected $id = null;

    /**
     * @var bool Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    protected $isGlobal = false;

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @var string Specific type (radio, dropdown, image...)
     */
    protected $type = '';

    /**
     * @var \jtl\Connector\Model\SpecificValue[]
     */
    protected $values = array();

    /**
     * @var \jtl\Connector\Model\SpecificI18n[]
     */
    protected $i18ns = array();

    /**
     * @param  Identity $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  bool $isGlobal Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     * @return \jtl\Connector\Model\Specific
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsGlobal($isGlobal)
    {
        return $this->setProperty('isGlobal', $isGlobal, 'bool');
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

    /**
     * @param  string $type Specific type (radio, dropdown, image...)
     * @return \jtl\Connector\Model\Specific
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
        $this->i18ns[] = $i18n;
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
