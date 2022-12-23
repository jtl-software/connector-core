<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

interface TranslatableAttributesInterface
{
    /**
     * @return array<TranslatableAttribute>
     */
    public function getAttributes(): array;

    /**
     * @param TranslatableAttribute ...$attributes
     *
     * @return TranslatableAttributesInterface
     */
    public function setAttributes(TranslatableAttribute ...$attributes): TranslatableAttributesInterface;

    /**
     * @param string $name
     *
     * @return TranslatableAttribute|null
     */
    public function findAttribute(string $name): ?TranslatableAttribute;
}
