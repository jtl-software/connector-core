<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
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
    public $_comment = '';

    /**
     * @type Byte[] 
     */
    public $_image = null;

    /**
     * @type integer|null Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public $_maximumSelection = 0;

    /**
     * @type integer|null Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    public $_minimumSelection = 0;

    /**
     * @type integer|null Optional sort order number
     */
    public $_sort = 0;

    /**
     * @type integer|null Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public $_type = 0;

    /**
     * Nav [ConfigGroup » One]
     *
     * @type \jtl\Connector\Model\ConfigGroupI18n[]
     */
    public $_i18n = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_i18n' => '\jtl\Connector\Model\ConfigGroupI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  Byte[] $image 
     * @return \jtl\Connector\Model\ConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
     */
    public function setImage(Byte[] $image)
    {
        return $this->setProperty('_image', $image, 'Byte[]');
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
        return $this->setProperty('_minimumSelection', $minimumSelection, 'integer');
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
        return $this->setProperty('_maximumSelection', $maximumSelection, 'integer');
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
        return $this->setProperty('_type', $type, 'integer');
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
        return $this->setProperty('_sort', $sort, 'integer');
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
        return $this->setProperty('_comment', $comment, 'string');
    }
    
    /**
     * @return string Optional internal comment to differantiate config groups by comment name
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigGroupI18n $i18n
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function addI18n(\jtl\Connector\Model\ConfigGroupI18n $i18n)
    {
        $this->_i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return ConfigGroupI18n
     */
    public function getI18n()
    {
        return $this->_i18n;
    }

    /**
     * @return \jtl\Connector\Model\ConfigGroup
     */
    public function clearI18n()
    {
        $this->_i18n = array();
        return $this;
    }
}

