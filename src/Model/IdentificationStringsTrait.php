<?php

namespace Jtl\Connector\Core\Model;

/**
 * Trait IdentificationStringsTrait
 * @package Jtl\Connector\Core\Model
 */
trait IdentificationStringsTrait
{
    /**
     * @var string[]
     *
     * @Serializer\Exclude
     */
    protected $identificationStrings = [];

    /**
     * @param string $identificationString
     * @return $this
     */
    public function addIdentificationString(string $identificationString): self
    {
        $this->identificationStrings[] = $identificationString;
        return $this;
    }

    /**
     * @param string ...$identificationStrings
     */
    public function setIdentificationStrings(string ...$identificationStrings): void
    {
        $this->identificationStrings = $identificationStrings;
    }

    /**
     * @param string $mainLanguageIso
     * @return array
     */
    abstract public function getIdentificationStrings(string $mainLanguageIso): array;
}
