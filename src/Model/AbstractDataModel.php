<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 */

namespace Jtl\Connector\Core\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Type\AbstractDataType;
use ReflectionClass;
use ReflectionException;

/**
 * Entity data model
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
abstract class AbstractDataModel extends AbstractModel
{
    /**
     * @var AbstractDataType
     * @Serializer\Type("Jtl\Connector\Core\Type\AbstractDataType")
     * @Serializer\AccessType("reflection")
     * @Serializer\Exclude
     */
    private $modelType = null;

    /**
     * @var string[]
     *
     * @Serializer\Exclude
     */
    protected $identificationStrings = [];

    /**
     * @return AbstractDataType
     * @throws ReflectionException
     */
    public function getModelType(): AbstractDataType
    {
        $coreModelNamespace = 'Jtl\\Connector\\Core\\Model';
        if ($this->modelType === null) {
            $reflect = new ReflectionClass($this);
            if ($reflect->getNamespaceName() !== $coreModelNamespace) {
                while ($reflect = $reflect->getParentClass()) {
                    if ($reflect->getNamespaceName() === $coreModelNamespace) {
                        break;
                    }
                }
            }

            $class = 'Jtl\\Connector\\Core\\Type\\' . $reflect->getShortName();
            $this->modelType = new $class;
        }

        return $this->modelType;
    }

    /**
     * @param string ...$identificationStrings
     * @return AbstractDataModel
     */
    public function setIdentificationStrings(string ...$identificationStrings): self
    {
        $this->identificationStrings = $identificationStrings;

        return $this;
    }

    /**
     * @param string $identificationString
     * @return AbstractDataModel
     */
    public function addIdentificationString(string $identificationString): self
    {
        $this->identificationStrings[] = $identificationString;

        return $this;
    }

    /**
     * @param string $mainLanguageIso
     * @return array<string>
     */
    public function getIdentificationStrings(string $mainLanguageIso): array
    {
        return $this->identificationStrings;
    }

    /**
     * @return bool
     */
    public function hasIdentificationStrings(): bool
    {
        return count($this->getIdentificationStrings('de')) > 0;
    }
}
