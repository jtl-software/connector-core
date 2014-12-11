<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Authentication
 */
namespace jtl\Connector\Core\Authentication;

use \jtl\Connector\Core\Exception\AuthenticationException;

/**
 * Wawi Authentication Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Wawi implements IAuthentication
{
    /**
     *
     * @var bool
     */
    protected static $_isValid = false;

    /**
     * Authentication validation state
     *
     * @return bool
     */
    public static function isValid()
    {
        return self::$_isValid;
    }

    /**
     * Validate the communication between an external tool and the connector
     *
     * @param mixed $data            
     * @throws \jtl\Connector\Core\Exception\AuthenticationException
     */
    public static function validate($data)
    {
        if (is_object($data) && isset($data->auth)) {
            // TODO: More validation
            
            return true;
        }
        
        throw new AuthenticationException("Not valid");
    }
}