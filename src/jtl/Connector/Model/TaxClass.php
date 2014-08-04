<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Tax class model (set in JTL-Wawi ERP).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class TaxClass extends DataModel
{
    /**
     * @var Identity Unique taxClass id
     */
    protected $id = null;

    /**
     * @var bool Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    protected $isDefault = false;

    /**
     * @var string Optional tax class name
     */
    protected $name = '';

    /**
     * @param  Identity $id Unique taxClass id
     * @return \jtl\Connector\Model\TaxClass
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique taxClass id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  bool $isDefault Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     * @return \jtl\Connector\Model\TaxClass
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'bool');
    }

    /**
     * @return bool Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  string $name Optional tax class name
     * @return \jtl\Connector\Model\TaxClass
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Optional tax class name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
