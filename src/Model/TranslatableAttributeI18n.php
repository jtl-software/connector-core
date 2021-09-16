<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\ModelException;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TranslatableAttributeI18n extends AbstractI18n
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';

    /**
     * @param string $name
     * @return TranslatableAttributeI18n
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $value
     * @return TranslatableAttributeI18n
     * @throws ModelException
     */
    public function setValue($value): self
    {
        $type = gettype($value);

        if (!in_array($type, ['boolean', 'integer', 'double', 'string'], true)) {
            throw ModelException::translatableAttributeValueTypeInvalid($type);
        }

        switch ($type) {
            case 'boolean':
                $this->value = $value === true ? '1' : '0';
                break;

            default:
                $this->value = (string)$value;
                break;
        }

        return $this;
    }

    /**
     * @param string $castToType
     * @return bool|float|int|string
     */
    public function getValue(string $castToType = TranslatableAttribute::TYPE_STRING)
    {
        $value = $this->value;
        switch ($castToType) {
            case TranslatableAttribute::TYPE_BOOL:
                $value = !('false' === $this->value) && boolval($this->value);
                break;

            case TranslatableAttribute::TYPE_INT:
                $value = (int)$this->value;
                break;

            case TranslatableAttribute::TYPE_FLOAT:
                $value = (float)$this->value;
                break;
        }

        return $value;
    }
}
