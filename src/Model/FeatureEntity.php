<?php
/**
 * @author Immanuel Klinkenberg <immanuel.klinkenberg@jtl-software.com>
 * @copyright 2010-2018 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Model;

class FeatureEntity
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var boolean
     */
    protected $pull = false;

    /**
     * @var boolean
     */
    protected $push = false;

    /**
     * @var boolean
     */
    protected $delete = false;

    /**
     * FeatureEntity constructor.
     * @param string $name
     * @param bool $pull
     * @param bool $push
     * @param bool $delete
     */
    public function __construct(string $name, bool $pull = false, bool $push = false, bool $delete = false)
    {
        $this->name = $name;
        $this->pull = $pull;
        $this->push = $push;
        $this->delete = $delete;
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
     * @return FeatureEntity
     */
    public function setName(string $name): FeatureEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function canPull(): bool
    {
        return $this->pull;
    }

    /**
     * @param bool $pull
     * @return FeatureEntity
     */
    public function setPull(bool $pull): FeatureEntity
    {
        $this->pull = $pull;
        return $this;
    }

    /**
     * @return bool
     */
    public function canPush(): bool
    {
        return $this->push;
    }

    /**
     * @param bool $push
     * @return FeatureEntity
     */
    public function setPush(bool $push): FeatureEntity
    {
        $this->push = $push;
        return $this;
    }

    /**
     * @return bool
     */
    public function canDelete(): bool
    {
        return $this->delete;
    }

    /**
     * @param bool $delete
     * @return FeatureEntity
     */
    public function setDelete(bool $delete): FeatureEntity
    {
        $this->delete = $delete;
        return $this;
    }

    /**
     * @return boolean[]
     */
    public function toArray()
    {
        return [
            'pull' => $this->canPull(),
            'push' => $this->canPush(),
            'delete' => $this->canDelete(),
        ];
    }
}
