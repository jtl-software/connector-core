<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Category Model
 * @access public
 */
abstract class Category extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_parentCategoryId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * Category Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_parentCategoryId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * Category Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>