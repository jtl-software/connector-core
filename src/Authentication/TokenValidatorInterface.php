<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Authentication;

interface TokenValidatorInterface
{
    /**
     * @param string $token
     *
     * @return bool
     */
    public function validate(string $token): bool;
}
