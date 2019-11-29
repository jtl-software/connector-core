<?php
namespace Jtl\Connector\Core\Model;

interface IdentificationInterface
{
    /**
     * @return string[]
     */
    public function getIdentificationStrings(): array;
}