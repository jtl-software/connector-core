<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Http
 */

namespace Jtl\Connector\Core\Http;

use Jtl\Connector\Core\Serializer\Json;
use Psr\Log\LoggerInterface;

/**
 * Http Response Handler
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Response
{
    /**
     * @param mixed[] $response
     * @param LoggerInterface|null $rpcLogger
     */
    public static function send(array $response, LoggerInterface $rpcLogger = null)
    {
        $jsonResponse = Json::encode($response);
        if(!is_null($rpcLogger)) {
            $rpcLogger->debug($jsonResponse);
        }

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json', true, 200);

        echo $jsonResponse;
    }
}
