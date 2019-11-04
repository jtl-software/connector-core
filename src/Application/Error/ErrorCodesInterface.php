<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Application\Error;

/**
 * Interface ErrorCodesInterface
 * @package Jtl\Connector\Core\Application\Error
 */
interface ErrorCodesInterface
{
    const ACTION_NOT_FOUND_IN_CONTROLLER = -32601;
    const CONTROLLER_DOES_NOT_EXISTS = -32602;
    const UNDEFINED_SESSION_HANDLER_ERROR = 789;
    const AUTHENTICATION_ERROR = 790;
}
