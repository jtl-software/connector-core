<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Rpc;

class Warnings
{
    public const
        TYPE_LOG     = 'log',
        TYPE_SEND    = 'send',
        TYPE_DEFAULT = 'default';

    public const WARNINGS = 'warnings';

    /** @var array<Warning>|null */
    protected ?array $warnings = null;

    /**
     * @return bool
     */
    public function hasWarnings(): bool
    {
        if ($this->warnings === null || \count($this->warnings) === 0) {
            return false;
        }

        return true;
    }

    /**
     * @param string $type
     * @param bool   $includeDefault
     * @return bool
     */
    public function hasSpecificWarningType(string $type, bool $includeDefault = true): bool
    {

        if (!$this->hasWarnings()) {
            return false;
        }

        $return = false;
        /** @var Warning[] $warnings */
        $warnings = $this->warnings;
        foreach ($warnings as $warning) {
            if ($warning->getType() === $type) {
                $return = true;
            }
        }

        if ($return === false && $includeDefault === true) {
            foreach ($warnings as $warning) {
                if ($warning->getType() === self::TYPE_DEFAULT) {
                    $return = true;
                }
            }
        }

        return $return;
    }

    /**
     * @param Warning $warning
     * @return $this
     */
    public function addWarning(Warning $warning): self
    {
        $this->warnings[] = $warning;
        return $this;
    }

    /**
     * @param string $type
     * @param bool   $includeDefault
     * @return array<Warning>|null
     */
    public function getWarningsByType(string $type, bool $includeDefault = true): ?array
    {
        $warnings = [];
        if (!$this->hasWarnings()) {
            return null;
        }

        if (!\is_null($this->warnings)) {
            foreach ($this->warnings as $warning) {
                if (
                    $warning->getType() === $type
                    || ($includeDefault === true && $warning->getType() === self::TYPE_DEFAULT)
                ) {
                    $warnings[] = $warning;
                }
            }
        }

        return empty($warnings) ? null : $warnings;
    }
}
