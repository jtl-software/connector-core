<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CrossSellingGroup Model
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. 
 *
 * @access public
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @var string crossSellingGroup id
     */
    protected $_id = '';
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Localized name
     */
    protected $_name = '';
    
    /**
     * @var string Optional localized description
     */
    protected $_description = '';
    
    /**
     * CrossSellingGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_localeName":
                case "_name":
                case "_description":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id crossSellingGroup id
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string crossSellingGroup id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param string $name Localized name
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $description Optional localized description
     * @return \jtl\Connector\Model\CrossSellingGroup
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional localized description
     */
    public function getDescription()
    {
        return $this->_description;
    }
}