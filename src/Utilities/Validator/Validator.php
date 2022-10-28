<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Utilities\Validator;

class Validator implements ValidatorInterface
{
    /** @var mixed */
    private $value;
    private bool $isNullable = false;

    /**
     * @inheritDoc
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function string(): ?string
    {
        if (!\is_string($this->value) && !($this->isNullable && !$this->hasValue())) {
            $type = 'string' . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function hasValue(): bool
    {
        return $this->value !== null;
    }

    /**
     * @param string $type
     *
     * @return void
     * @throws \TypeError
     */
    private function throwException(string $type): void
    {
        $message = $this->hasValue()
            ? $this->value . 'must be type ' . $type
            : 'Type Error: Value is null';

        throw new \TypeError($message);
    }

    /**
     * @inheritDoc
     */
    public function int(): ?int
    {
        if (!\is_int($this->value) && !($this->isNullable && !$this->hasValue())) {
            $type = 'int' . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function float(): ?float
    {
        if (!\is_float($this->value) && !($this->isNullable && !$this->hasValue())) {
            $type = 'float' . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function bool(): ?bool
    {
        if (!\is_bool($this->value) && !($this->isNullable && !$this->hasValue())) {
            $type = 'bool' . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function array(): ?array
    {
        if (!\is_array($this->value) && !($this->isNullable && !$this->hasValue())) {
            $type = 'array' . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function instanceOf(string $class): ?object
    {
        if (!($this->value instanceof $class) && !($this->isNullable && !$this->hasValue())) {
            $type = $class . ($this->isNullable ? '|null' : '');
            $this->throwException($type);
        }

        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function setIsNullable(bool $isNullable): self
    {
        $this->isNullable = $isNullable;

        return $this;
    }
}
