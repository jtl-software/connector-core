<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Authentication
 */
namespace jtl\Connector\Core\Authentication;

/**
 * Authentication Interface
 *
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
interface IAuthentication
{

    /**
     * Authentication validation state
     *
     * @return bool
     */
    public static function isValid();

    /**
     * Validate the communication between an external tool and the connector
     *
     * @param mixed $data
     * @return bool
     */
    public static function validate($data);
}
