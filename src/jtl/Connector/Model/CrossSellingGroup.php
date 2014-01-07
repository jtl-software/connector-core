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
     * @var string - crossSellingGroup id
     */
    protected $_id = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Localized name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional localized description
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>