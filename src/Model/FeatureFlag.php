<?php
/**
 * @author Immanuel Klinkenberg <immanuel.klinkenberg@jtl-software.com>
 * @copyright 2010-2018 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Model;

class FeatureFlag
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var boolean
     */
    protected $active = false;

    /**
     * FeatureFlag constructor.
     * @param string $name
     * @param boolean $active
     */
    public function __construct(string $name, bool $active = false)
    {
        $this->name = $name;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FeatureFlag
     */
    public function setName(string $name): FeatureFlag
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return FeatureFlag
     */
    public function setActive(bool $active): FeatureFlag
    {
        $this->active = $active;
        return $this;
    }
}