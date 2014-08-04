<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specifies product units like "ml", "l", " cm"..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MeasurementUnit extends DataModel
{
    /**
     * @type Identity Unit id
     */
    protected $id = null;

    /**
     * @type string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    protected $code = '';

    /**
     * @type string Synonym e.g. 'ml'
     */
    protected $displayCode = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unit id
     * @return \jtl\Connector\Model\MeasurementUnit
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unit id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $code Optional UCUM-Code, see  http://unitsofmeasure.org/
     * @return \jtl\Connector\Model\MeasurementUnit
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCode(Identity $code)
    {
        return $this->setProperty('Code', $code, 'string');
    }

    /**
     * @return string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param  string $displayCode Synonym e.g. 'ml'
     * @return \jtl\Connector\Model\MeasurementUnit
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDisplayCode(Identity $displayCode)
    {
        return $this->setProperty('DisplayCode', $displayCode, 'string');
    }

    /**
     * @return string Synonym e.g. 'ml'
     */
    public function getDisplayCode()
    {
        return $this->displayCode;
    }

 
}
