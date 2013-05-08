<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecific Model
 * @access public
 */
abstract class ProductSpecific extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_specificValueId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * ProductSpecific Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_specificValueId":
            case "_productId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * ProductSpecific Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>