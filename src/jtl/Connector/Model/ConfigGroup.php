<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigGroup Model
 * Config group holds several configItems and settings
 *
 * @access public
 */
class ConfigGroup extends DataModel
{
    /**
     * @var string Unique configGroup id
     */
    protected $_id = '';
    
    /**
     * @var string Optional image file path
     */
    protected $_imagePath = '';
    
    /**
     * @var int Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    protected $_minimumSelection = 0;
    
    /**
     * @var int Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    protected $_maximumSelection = 0;
    
    /**
     * @var int Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    protected $_type = 0;
    
    /**
     * @var int Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var string Optional internal comment to differantiate config groups by comment name
     */
    protected $_comment = '';
    
    /**
     * ConfigGroup Setter
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
                case "_imagePath":
                case "_comment":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_minimumSelection":
                case "_maximumSelection":
                case "_type":
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique configGroup id
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique configGroup id
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $imagePath Optional image file path
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setImagePath($imagePath)
    {
        $this->_imagePath = (string)$imagePath;
        return $this;
    }
    
    /**
     * @return string Optional image file path
     */
    public function getImagePath()
    {
        return $this->_imagePath;
    }
    
    /**
     * @param int $minimumSelection Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMinimumSelection($minimumSelection)
    {
        $this->_minimumSelection = (int)$minimumSelection;
        return $this;
    }
    
    /**
     * @return int Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    public function getMinimumSelection()
    {
        return $this->_minimumSelection;
    }
    
    /**
     * @param int $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMaximumSelection($maximumSelection)
    {
        $this->_maximumSelection = (int)$maximumSelection;
        return $this;
    }
    
    /**
     * @return int Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public function getMaximumSelection()
    {
        return $this->_maximumSelection;
    }
    
    /**
     * @param int $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param int $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param string $comment Optional internal comment to differantiate config groups by comment name
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setComment($comment)
    {
        $this->_comment = (string)$comment;
        return $this;
    }
    
    /**
     * @return string Optional internal comment to differantiate config groups by comment name
     */
    public function getComment()
    {
        return $this->_comment;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}