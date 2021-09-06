<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 */

namespace Jtl\Connector\Core\Model;


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
    protected $identificationStrings = [];

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
        return count($this->getIdentificationStrings()) > 0;
    }
}
