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
     * @type Identity Unique configGroup id
     */
    protected $id = null;

    /**
     * @type string Optional internal comment to differantiate config groups by comment name
     */
    protected $comment = '';

    /**
     * @type string Optional image file path
     */
    protected $imagePath = '';

    /**
     * @type int Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    protected $maximumSelection = 0;

    /**
     * @type int Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    protected $minimumSelection = 0;

    /**
     * @type int Optional sort order number
     */
    protected $sort = 0;

    /**
     * @type int Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    protected $type = 0;

    /**
     * @type \jtl\Connector\Model\ConfigGroupI18n[]
     */
    protected $i18n = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique configGroup id
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique configGroup id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $comment Optional internal comment to differantiate config groups by comment name
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setComment(Identity $comment)
    {
        return $this->setProperty('Comment', $comment, 'string');
    }

    /**
     * @return string Optional internal comment to differantiate config groups by comment name
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param  string $imagePath Optional image file path
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setImagePath(Identity $imagePath)
    {
        return $this->setProperty('ImagePath', $imagePath, 'string');
    }

    /**
     * @return string Optional image file path
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param  int $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMaximumSelection(Identity $maximumSelection)
    {
        return $this->setProperty('MaximumSelection', $maximumSelection, 'int');
    }

    /**
     * @return int Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public function getMaximumSelection()
    {
        return $this->maximumSelection;
    }

    /**
     * @param  int $minimumSelection Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMinimumSelection(Identity $minimumSelection)
    {
        return $this->setProperty('MinimumSelection', $minimumSelection, 'int');
    }

    /**
     * @return int Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    public function getMinimumSelection()
    {
        return $this->minimumSelection;
    }

    /**
     * @param  int $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  int $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setType(Identity $type)
    {
        return $this->setProperty('Type', $type, 'int');
    }

    /**
     * @return int Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public function getType()
    {
        return $this->type;
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
     * @return \jtl\Connector\Model\ConfigGroupI18n[]
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
