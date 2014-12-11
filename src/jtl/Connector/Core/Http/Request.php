<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Http
 */

namespace jtl\Connector\Core\Http;

use \jtl\Connector\Core\Compression\Gzip;
use \jtl\Connector\Core\Exception\CompressionException;
use \jtl\Connector\Core\Exception\HttpException;

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
     * @return Ambiguous <NULL, string>
     * @throws \jtl\Connector\Core\Exception\HttpException
     */
    public static function get($method = "post", $root = "jtlrpc")
    {
        switch (strtolower($method)) {
            case "post":
                return isset($_POST[$root]) ? self::stripData($_POST[$root]) : null;
            case "get":
                return isset($_GET[$root]) ? self::stripData($_GET[$root]) : null;
            case "request":
                return isset($_REQUEST[$root]) ? self::stripData($_REQUEST[$root]) : null;
            case "files":
                return isset($_FILES[$root]) ? $_FILES[$root] : null;
            default:
                throw new HttpException("Unknown method ({$method})");
        }
        
        return null;
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
        return @is_uploaded_file($_FILES[$name]["tmp_name"]);
    }
    
    /**
     * Moves an uploaded file to a new location
     * 
     * @param string $name
     * @param string $path
     * @param string $filename
     * @return boolean
     */
    public static function moveFileupload($path, $filename, $name = "jtlrpc")
    {
        return @move_uploaded_file($_FILES[$name]["tmp_name"], $path . $filename);
    }
    
    /**
     * Checks get_magic_quotes_gpc
     * 
     * @param string $data
     * @return string
     */
    public static function stripData($data)
    {
        if (get_magic_quotes_gpc()) {
            return stripslashes($data);
        }
        
        return $data;
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
                $path = array(
                    APP_DIR,
                    '..',
                    'vendor',
                    'jtl',
                    'core',
                    'tmp'
                );

                $extension = $pathinfo["extension"];
                $filename = uniqid() . ".{$extension}";
                $path = realpath(implode(DIRECTORY_SEPARATOR, $path)) . '/';

                if (Request::moveFileupload($path, $filename, $name)) {
                    return "{$path}{$filename}";
                }
                else {
                    throw new HttpException("Could not write file to tmp dir");
                }
            }
            else {
                throw new HttpException("Could not determine the file extension");
            }
        }
        
        return null;
    }
    
    /**
     * Delete File
     *
     * @param string $filename
     */
    public static function deleteFileupload($filename)
    {
        if ($filename !== null) {
            return @unlink($filename);
        }
    
        return false;
    }
    
    /**
     * Main HTTP Handler
     * 
     * @throws CompressionException
     * @throws HttpException
     * @return string|null
     */
    public static function handle() 
    {
        $jtlrpc = Request::get();

        if ($jtlrpc !== null) {
            return Request::stripData($jtlrpc);
        }
        elseif (Request::isFileupload()) {
            $filename = uniqid() . ".zip";
            $path = APP_DIR . '/../tmp/';
            if (Request::moveFileupload($path, $filename)) {
                $gzip = new Gzip();
        
                try {
                    $data = $gzip->read($path . $filename);
                    $jtlrpc = Request::stripData($data);
        
                    @unlink($path . $filename);
        
                    return $jtlrpc;
                }
                catch (CompressionException $exc) {
                    @unlink($path . $filename);
                    
                    throw $exc;
                }
            }
            else {
                throw new HttpException("Could not write file to tmp dir");
            }
        } else {
            parse_str(file_get_contents('php://input'));

            return $jtlrpc;
        }
        
        return null;
    }
    
    /**
     * Session HTTP Getter
     * 
     * @return string|NULL
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