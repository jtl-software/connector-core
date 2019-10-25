<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Authentication;

use Jtl\Connector\Core\Model\AuthRequest;

interface ITokenValidator
{
    /**
     * @param AuthRequest $request
     * @return boolean
     */
    public function validate(AuthRequest $request);
}
