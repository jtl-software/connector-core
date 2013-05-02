<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ConfigGroup Model
 * @access public
 */
abstract class ConfigGroup extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_imagePath;
    
    /**
     * @var 
     */
    protected $_minimumSelection;
    
    /**
     * @var 
     */
    protected $_maximumSelection;
    
    /**
     * @var 
     */
    protected $_type;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_comment;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $imagePath
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setImagePath($imagePath)
    {
        $this->_imagePath = ()$imagePath;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getImagePath()
    {
        return $this->_imagePath;
    }
    
    /**
     * @param  $minimumSelection
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMinimumSelection($minimumSelection)
    {
        $this->_minimumSelection = ()$minimumSelection;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMinimumSelection()
    {
        return $this->_minimumSelection;
    }
    
    /**
     * @param  $maximumSelection
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMaximumSelection($maximumSelection)
    {
        $this->_maximumSelection = ()$maximumSelection;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMaximumSelection()
    {
        return $this->_maximumSelection;
    }
    
    /**
     * @param  $type
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setType($type)
    {
        $this->_type = ()$type;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
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
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ConfigGroup/ConfigGroup.json", $this->getPublic(array()));
    }
}
?>