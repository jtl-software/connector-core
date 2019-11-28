<?php
namespace Jtl\Connector\Core\Model;

interface ModelIdentificationInterface
{
    /**
     * @return string
     */
    public function getIdentificationString(): string;
}