<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Statistic Model
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Internal
 */
class Statistic extends AbstractModel
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("available")
     * @Serializer\Accessor(getter="getAvailable",setter="setAvailable")
     */
    protected int $available = 0;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("controllerName")
     * @Serializer\Accessor(getter="getControllerName",setter="setControllerName")
     */
    protected string $controllerName = '';

    /**
     * @return integer
     */
    public function getAvailable(): int
    {
        return $this->available;
    }

    /**
     * @param integer $available
     *
     * @return $this
     */
    public function setAvailable(int $available): self
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @param string $controllerName
     *
     * @return $this
     */
    public function setControllerName(string $controllerName): self
    {
        $this->controllerName = $controllerName;

        return $this;
    }
}
