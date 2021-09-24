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
     * @return AbstractModel
     */
    public function setIdentificationString(string $identificationString): self
    {
        if (!in_array($identificationString, $this->identificationStrings, true)) {
            $this->identificationStrings[] = $identificationString;
        }

        return $this;
    }

    /**
     * @param string $subject
     * @param string $identificationString
     * @return $this
     */
    public function setIdentificationStringBySubject(string $subject, string $identificationString): self
    {
        $this->identificationStrings[$subject] = $identificationString;

        return $this;
    }

    /**
     * @param string $identificationString
     * @return AbstractModel
     */
    public function unsetIdentificationString(string $identificationString): self
    {
        $index = array_search($identificationString, $this->identificationStrings, true);
        if($index !== false) {
            unset($this->identificationStrings[$index]);
        }

        return $this;
    }

    /**
     * @param string $subject
     * @return AbstractModel
     */
    public function unsetIdentificationStringBySubject(string $subject): self
    {
        unset($this->identificationStrings[$subject]);

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getIdentificationStrings(): array
    {
        return array_values($this->identificationStrings);
    }

    /**
     * @return bool
     */
    public function hasIdentificationStrings(): bool
    {
        return count($this->identificationStrings) > 0;
    }
}
