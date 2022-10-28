<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Utilities\Validator;

interface ValidatorInterface
{
    /**
     * @param mixed $value
     */
    public function __construct($value);

    /**
     * @param bool $isNullable
     *
     * @return $this
     */
    public function setIsNullable(bool $isNullable): self;

    /**
     * @return bool
     */
    public function hasValue(): bool;

    /**
     * @return string|null
     * @throws \TypeError
     */
    public function string(): ?string;

    /**
     * @return int|null
     * @throws \TypeError
     */
    public function int(): ?int;

    /**
     * @return float|null
     * @throws \TypeError
     */
    public function float(): ?float;

    /**
     * @return bool|null
     * @throws \TypeError
     */
    public function bool(): ?bool;

    /**
     * @return array|null
     * @throws \TypeError
     */
    public function array(): ?array;

    /**
     * @param string $class
     *
     * @return object|null
     */
    public function instanceOf(string $class): ?object;
}
