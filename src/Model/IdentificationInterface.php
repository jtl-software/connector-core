<?php
namespace Jtl\Connector\Core\Model;

interface IdentificationInterface
{
    /**
     * @param string $mainLanguageIso
     * @return string[]
     */
    public function getIdentificationStrings(string $mainLanguageIso): array;
}
