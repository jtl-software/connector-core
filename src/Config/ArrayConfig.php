<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Config;

use Noodlehaus\AbstractConfig;

class ArrayConfig extends AbstractConfig implements CoreConfigInterface
{
    /**
     * @inheritDoc
     */
    public function getBool(string $valueName, ?bool $default = null): bool
    {
        $value = $this->get($valueName, $default);
        if (!\is_bool($value)) {
            throw new \TypeError(\sprintf('Value for key "%s" must be of type bool', $valueName));
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function getString(string $valueName, ?string $default = null): string
    {
        $value = $this->get($valueName, $default);
        if (!\is_string($value)) {
            throw new \TypeError(\sprintf('Value for key "%s" must be of type string', $valueName));
        }

        return $value;
    }
}
