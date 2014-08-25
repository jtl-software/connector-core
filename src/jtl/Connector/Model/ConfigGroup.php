<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Config group holds several configItems and settings.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class ConfigGroup extends DataModel
{
    /**
     * @var Identity Unique configGroup id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string Optional internal comment to differantiate config groups by comment name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     * @Serializer\Accessor(getter="getComment",setter="setComment")
     */
    protected $comment = '';

    /**
     * @var string Optional image file path
     * @Serializer\Type("string")
     * @Serializer\SerializedName("imagePath")
     * @Serializer\Accessor(getter="getImagePath",setter="setImagePath")
     */
    protected $imagePath = '';

    /**
     * @var int Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maximumSelection")
     * @Serializer\Accessor(getter="getMaximumSelection",setter="setMaximumSelection")
     */
    protected $maximumSelection = 0;

    /**
     * @var int Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("minimumSelection")
     * @Serializer\Accessor(getter="getMinimumSelection",setter="setMinimumSelection")
     */
    protected $minimumSelection = 0;

    /**
     * @var int Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;

    /**
     * @var int Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = 0;

    /**
     * End: 1 (One of ConfigGroup)
     *      * (Collection of ConfigGroupI18n)
     *
     * @var \jtl\Connector\Model\ConfigGroupI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique configGroup id
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $imagePath Optional image file path
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setImagePath($imagePath)
    {
        return $this->setProperty('imagePath', $imagePath, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setMaximumSelection($maximumSelection)
    {
        return $this->setProperty('maximumSelection', $maximumSelection, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setMinimumSelection($minimumSelection)
    {
        return $this->setProperty('minimumSelection', $minimumSelection, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'int');
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
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ConfigGroupI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }

 
}
