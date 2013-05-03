<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigGroup Model
 * @access public
 */
abstract class ConfigGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_imagePath;
    
    /**
     * @var int
     */
    protected $_minimumSelection;
    
    /**
     * @var int
     */
    protected $_maximumSelection;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_comment;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $imagePath
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setImagePath($imagePath)
    {
        $this->_imagePath = (string)$imagePath;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getImagePath()
    {
        return $this->_imagePath;
    }
    /**
     * @param int $minimumSelection
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMinimumSelection($minimumSelection)
    {
        $this->_minimumSelection = (int)$minimumSelection;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMinimumSelection()
    {
        return $this->_minimumSelection;
    }
    /**
     * @param int $maximumSelection
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMaximumSelection($maximumSelection)
    {
        $this->_maximumSelection = (int)$maximumSelection;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMaximumSelection()
    {
        return $this->_maximumSelection;
    }
    /**
     * @param int $type
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param string $comment
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setComment($comment)
    {
        $this->_comment = (string)$comment;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getComment()
    {
        return $this->_comment;
    }
}
?>