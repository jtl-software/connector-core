<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specifies product units like "piece", "bottle", "package"..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Unit extends DataModel
{
    /**
     * @type string 
     */
    protected $localeName = '';

    /**
     * @type string 
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Unit
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
     * @param  string $localeName 
     * @return \jtl\Connector\Model\Unit
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}

