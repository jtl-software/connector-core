<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Http
 */
namespace Jtl\Connector\Core\Http;

use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;

/**
 * Http Request Handler
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Request
{
    /**
     * Http Request Getter
     *
     * @param string $method
     * @param string $root
     * @return mixed|string|null
     * @throws HttpException
     */
    public static function get($method = "post", $root = "jtlrpc")
    {
        switch (strtolower($method)) {
            case "post":
                return isset($_POST[$root]) ? $_POST[$root] : null;
            case "get":
                return isset($_GET[$root]) ? $_GET[$root] : null;
            case "request":
                return isset($_REQUEST[$root]) ? $_REQUEST[$root] : null;
            case "files":
                return isset($_FILES[$root]) ? $_FILES[$root] : null;
            default:
                throw new HttpException("Unknown method ({$method})");
        }
    }
    
    /**
     * Returns Http Request method
     *
     * @return string
     */
    public static function getMethod()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }
    
    /**
     * Http Request Check
     *
     * @param string $method
     * @param string $root
     * @return boolean
     */
    public static function exists($method = "post", $root = "jtlrpc")
    {
        switch (strtolower($method)) {
            case "post":
                return isset($_POST[$root]);
            case "get":
                return isset($_GET[$root]);
            case "request":
                return isset($_REQUEST[$root]);
            case "files":
                return isset($_FILES[$root]);
        }
        
        return false;
    }
    
    /**
     * Tells whether the file was uploaded via HTTP POST
     *
     * @param string $name
     * @return boolean
     */
    public static function isFileupload($name = "jtlrpc")
    {
        return isset($_FILES[$name]) && is_uploaded_file($_FILES[$name]["tmp_name"]);
    }
    
    /**
     * Moves an uploaded file to a new location
     *
     * @param string $path
     * @param string $filename
     * @param string $name
     * @return boolean
     */
    public static function moveFileupload($path, $filename, $name = "jtlrpc")
    {
        return move_uploaded_file($_FILES[$name]["tmp_name"], $path . $filename);
    }
    
    /**
     * File Upload Handler
     *
     * @param string $name
     * @throws HttpException
     * @return string|NULL
     */
    public static function handleFileupload($name = "file")
    {
        if (Request::isFileupload($name)) {
            $pathinfo = pathinfo($_FILES[$name]["name"]);
            
            if (isset($pathinfo["extension"])) {
                $extension = $pathinfo["extension"];
                $filename = uniqid() . ".{$extension}";
                $path = Temp::getDirectory() . DIRECTORY_SEPARATOR;

                if (Request::moveFileupload($path, $filename, $name)) {
                    return "{$path}{$filename}";
                } else {
                    throw new HttpException("Could not write file to tmp dir");
                }
            } else {
                throw new HttpException("Could not determine the file extension");
            }
        }
        
        return null;
    }

    /**
     * Delete File
     *
     * @param $filename
     * @return bool
     */
    public static function deleteFileupload($filename)
    {
        if ($filename !== null) {
            return @unlink($filename);
        }
    
        return false;
    }

    /**
     * @param array $filesnames
     * @param bool|true $withFolder
     * @return bool
     */
    public static function deleteFileuploads(array $filesnames = [], $withFolder = true)
    {
        if (count($filesnames) > 0) {
            $folder = null;
            foreach ($filesnames as $filesname) {
                if ($folder === null) {
                    $infos = pathinfo($filesname);
                    $folder = $infos['dirname'];
                }

                @unlink($filesname);
            }

            if ($withFolder && $folder !== null) {
                @rmdir($folder);
            }

            return true;
        }

        return false;
    }

    /**
     * Main HTTP Handler
     *
     * @return string|null
     */
    public static function handle(): ?string
    {
        $result = [];
        parse_str(file_get_contents('php://input'), $result);
        $jtlrpc = !empty($result['jtlrpc']) ? $result['jtlrpc'] : null;

        return $jtlrpc;
    }

    /**
     * Session HTTP Getter
     *
     * @return mixed|string|null
     * @throws HttpException
     */
    public static function getSession()
    {
        $method = 'request';
        $root = 'jtlauth';
        
        if (self::exists($method, $root)) {
            return self::get($method, $root);
        }
        
        return null;
    }
}
