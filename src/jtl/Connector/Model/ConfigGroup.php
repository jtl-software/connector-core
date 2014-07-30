<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Config group holds several configItems and settings.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigGroup extends DataModel
{
    /**
     * @type string Optional internal comment to differantiate config groups by comment name
     */
    protected $comment = '';

    /**
     * @type Byte[] 
     */
    protected $image = null;

    /**
     * @type integer|null Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    protected $maximumSelection = 0;

    /**
     * @type integer|null Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    protected $minimumSelection = 0;

    /**
     * @type integer|null Optional sort order number
     */
    protected $sort = 0;

    /**
     * @type integer|null Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    protected $type = 0;

    /**
     * Nav [ConfigGroup » One]
     *
     * @type \jtl\Connector\Model\ConfigGroupI18n[]
     */
    protected $i18n = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'image' => '\jtl\Connector\Model\Byte[]',
        'minimumSelection' => 'integer',
        'maximumSelection' => 'integer',
        'type' => 'integer',
        'sort' => 'integer',
        'comment' => 'string',
        'i18n' => '\jtl\Connector\Model\ConfigGroupI18n',
    );


    /**
     * @param  Byte[] $image 
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
     */
    public function setImage(Byte[] $image)
    {
        return $this->setProperty('image', $image, 'Byte[]');
    }
    
    /**
     * @return Byte[] 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param  integer $minimumSelection Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMinimumSelection($minimumSelection)
    {
        return $this->setProperty('minimumSelection', $minimumSelection, 'integer');
    }
    
    /**
     * @return integer Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    public function getMinimumSelection()
    {
        return $this->minimumSelection;
    }

    /**
     * @param  integer $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMaximumSelection($maximumSelection)
    {
        return $this->setProperty('maximumSelection', $maximumSelection, 'integer');
    }
    
    /**
     * @return integer Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public function getMaximumSelection()
    {
        return $this->maximumSelection;
    }

    /**
     * @param  integer $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'integer');
    }
    
    /**
     * @return integer Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  integer $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $comment Optional internal comment to differantiate config groups by comment name
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setComment($comment)
    {
        return $this->setProperty('comment', $comment, 'string');
    }
    
    /**
     * @return string Optional internal comment to differantiate config groups by comment name
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigGroupI18n $i18n
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function addI18n(\jtl\Connector\Model\ConfigGroupI18n $i18n)
    {
        $this->i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return ConfigGroupI18n
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function clearI18n()
    {
        $this->i18n = array();
        return $this;
    }
}

