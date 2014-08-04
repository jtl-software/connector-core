<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specifies product units like "ml", "l", " cm"..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MeasurementUnit extends DataModel
{
    /**
     * @var Identity Unit id
     */
    protected $id = null;

    /**
     * @var string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    protected $code = '';

    /**
     * @var string Synonym e.g. 'ml'
     */
    protected $displayCode = '';

    /**
     * @param  Identity $id Unit id
     * @return \jtl\Connector\Model\MeasurementUnit
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCode($code)
    {
        return $this->setProperty('code', $code, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDisplayCode($displayCode)
    {
        return $this->setProperty('displayCode', $displayCode, 'string');
    }

    /**
     * @return string Synonym e.g. 'ml'
     */
    public function getDisplayCode()
    {
        return $this->displayCode;
    }

 
}
