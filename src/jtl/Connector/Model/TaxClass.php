<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Tax class model (set in JTL-Wawi ERP).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class TaxClass extends DataModel
{
    /**
     * @type Identity Unique taxClass id
     */
    protected $id = null;

    /**
     * @type bool Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    protected $isDefault = false;

    /**
     * @type string Optional tax class name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique taxClass id
     * @return \jtl\Connector\Model\TaxClass
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsDefault(Identity $isDefault)
    {
        return $this->setProperty('IsDefault', $isDefault, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Optional tax class name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
