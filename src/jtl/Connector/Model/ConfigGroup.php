<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Config group holds several configItems and settings.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigGroup extends DataModel
{
    /**
     * @type string Optional internal comment to differantiate config groups by comment name
     */
    protected $_comment = '';

    /**
     * @type Byte[] 
     */
    protected $_image = null;

    /**
     * @type integer|null Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    protected $_maximumSelection = 0;

    /**
     * @type integer|null Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    protected $_minimumSelection = 0;

    /**
     * @type integer|null Optional sort order number
     */
    protected $_sort = 0;

    /**
     * @type integer|null Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    protected $_type = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  Byte[] $image 
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
	 */
	public function setImage(Byte[] $image)
	{
		
		$this->_image = $image;
		return $this;
	}
	
	/**
	 * @return Byte[] 
	 */
	public function getImage()
	{
		return $this->_image;
	}

	/**
	 * @param  integer $minimumSelection Optional minimum number required selections. Default 0 for no minimum requirement. 
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setMinimumSelection($minimumSelection)
	{
		if (!is_integer($minimumSelection))
			throw new InvalidArgumentException('integer expected.');
		$this->_minimumSelection = $minimumSelection;
		return $this;
	}
	
	/**
	 * @return integer Optional minimum number required selections. Default 0 for no minimum requirement. 
	 */
	public function getMinimumSelection()
	{
		return $this->_minimumSelection;
	}

	/**
	 * @param  integer $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setMaximumSelection($maximumSelection)
	{
		if (!is_integer($maximumSelection))
			throw new InvalidArgumentException('integer expected.');
		$this->_maximumSelection = $maximumSelection;
		return $this;
	}
	
	/**
	 * @return integer Optional maximum number allowed selections. Default 0 for no maximum limitation.
	 */
	public function getMaximumSelection()
	{
		return $this->_maximumSelection;
	}

	/**
	 * @param  integer $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setType($type)
	{
		if (!is_integer($type))
			throw new InvalidArgumentException('integer expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return integer Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  integer $sort Optional sort order number
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer Optional sort order number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  string $comment Optional internal comment to differantiate config groups by comment name
	 * @return \jtl\Connector\Model\ConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setComment($comment)
	{
		if (!is_string($comment))
			throw new InvalidArgumentException('string expected.');
		$this->_comment = $comment;
		return $this;
	}
	
	/**
	 * @return string Optional internal comment to differantiate config groups by comment name
	 */
	public function getComment()
	{
		return $this->_comment;
	}
}

