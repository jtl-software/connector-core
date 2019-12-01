<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Http
 */

namespace Jtl\Connector\Core\Http;

use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\Logger\Logger;

/**
 * Http Response Handler
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Response
{
    /**
     *
     * Http Response sender
     *
     * @param string $response
     */
    public static function send(array $response)
    {
        $jsonResponse = Json::encode($response);
        Logger::write($jsonResponse, Logger::DEBUG, Logger::CHANNEL_RPC);

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json', true, 200);

        echo $jsonResponse;

        exit();
    }
}
