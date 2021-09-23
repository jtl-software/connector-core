<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Core Model Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractModel
{
    /**
     * @var string[]
     *
     * @Serializer\Exclude
     */
    private $identificationStrings = [];

    /**
     * @param string ...$identificationStrings
     * @return AbstractModel
     */
    public function setIdentificationStrings(string ...$identificationStrings): self
    {
        $this->identificationStrings = $identificationStrings;

        return $this;
    }

    /**
     * @param string $identificationString
     * @param string|null $subject
     * @return AbstractModel
     */
    public function setIdentificationString(string $identificationString, string $subject = null): self
    {
        if ($subject !== null) {
            $this->identificationStrings[$subject] = $identificationString;
        } elseif (!in_array($identificationString, $this->identificationStrings, true)) {
            $this->identificationStrings[] = $identificationString;
        }

        return $this;
    }

    /**
     * @param string $mainLanguageIso
     * @return array<string>
     */
    public function getIdentificationStrings(string $mainLanguageIso = 'de'): array
    {
        return array_values($this->identificationStrings);
    }

    /**
     * @return bool
     */
    public function hasIdentificationStrings(): bool
    {
        return count($this->getIdentificationStrings()) > 0;
    }
}
