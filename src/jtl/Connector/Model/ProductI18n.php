<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductI18n Model
 * Locale specific texts for product
 *
 * @access public
 */
class ProductI18n extends DataModel
{
    /**
     * @var string - locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string - Product name / title
     */
    protected $_name = '';
    
    /**
     * @var string - Optional path of product URL
     */
    protected $_urlPath = '';
    
    /**
     * @var string - Optional product description
     */
    protected $_description = '';
    
    /**
     * @var string - Optional product shortdescription
     */
    protected $_shortDescription = '';
    
    /**
     * ProductI18n Setter
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
                case "_localeName":
                case "_productId":
                case "_name":
                case "_urlPath":
                case "_description":
                case "_shortDescription":
                
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