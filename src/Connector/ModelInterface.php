<?php
namespace Jtl\Connector\Core\Connector;

interface ModelInterface
{
    /**
     * @return string
     */
    public function getModelNamespace(): string;
}