<?php
namespace Jtl\Connector\Core\Model;

interface I18nInterface
{
    /**
     * @return string
     */
    public function getLanguageIso(): string;
}