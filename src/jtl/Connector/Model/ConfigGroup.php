<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Config group holds several configItems and settings
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ConfigGroup extends DataModel
{
    /**
     * @var string Optional internal comment to differantiate config groups by comment name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     * @Serializer\Accessor(getter="getComment",setter="setComment")
     */
    protected $comment = '';

    /**
     * @var string Unique configGroup id
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("imagePath")
     * @Serializer\Accessor(getter="getImagePath",setter="setImagePath")
     */
    protected $imagePath = '';

    /**
     * @var string Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @Serializer\Type("string")
     * @Serializer\SerializedName("maximumSelection")
     * @Serializer\Accessor(getter="getMaximumSelection",setter="setMaximumSelection")
     */
    protected $maximumSelection = '';

    /**
     * @var string Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("minimumSelection")
     * @Serializer\Accessor(getter="getMinimumSelection",setter="setMinimumSelection")
     */
    protected $minimumSelection = '';

    /**
     * @var string Optional sort order number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = '';

    /**
     * @var string Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';

    /**
     * @var jtl\Connector\Model\ConfigGroupI18n[] 
     * @Serializer\Type("array<jtl\Connector\Model\ConfigGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();


    /**
     * @param string $comment Optional internal comment to differantiate config groups by comment name
     * @return \jtl\Connector\Model\ConfigGroup
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
     * @param string $id Unique configGroup id
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'string');
    }

    /**
     * @return string Unique configGroup id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $imagePath 
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setImagePath($imagePath)
    {
        return $this->setProperty('imagePath', $imagePath, 'string');
    }

    /**
     * @return string 
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param string $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMaximumSelection($maximumSelection)
    {
        return $this->setProperty('maximumSelection', $maximumSelection, 'string');
    }

    /**
     * @return string Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public function getMaximumSelection()
    {
        return $this->maximumSelection;
    }

    /**
     * @param string $minimumSelection Optional minimum number required selections. Default 0 for no minimum requirement. 
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setMinimumSelection($minimumSelection)
    {
        return $this->setProperty('minimumSelection', $minimumSelection, 'string');
    }

    /**
     * @return string Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    public function getMinimumSelection()
    {
        return $this->minimumSelection;
    }

    /**
     * @param string $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'string');
    }

    /**
     * @return string Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }

    /**
     * @return string Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \jtl\Connector\Model\ConfigGroupI18n $i18n
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function addI18n(\jtl\Connector\Model\ConfigGroupI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\ConfigGroupI18n[]
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
