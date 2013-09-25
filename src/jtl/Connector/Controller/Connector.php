<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Controller;

use \jtl\Core\Controller\Controller as CoreController;
use \jtl\Core\Exception\ControllerException;
use \jtl\Connector\Result\Action;
use \jtl\Core\Rpc\Error;
use \jtl\Connector\Application\Application;

/**
 * Base Config Controller
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Connector extends CoreController
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::push()
     */
    public function push($params)
    {
        // Not yet implemented
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::pull()
     */
    public function pull($params)
    {
        // Not yet implemented
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::delete()
     */
    public function delete($params)
    {
        // Not yet implemented
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::statistic()
     */
    public function statistic($params)
    {
        // Not yet implemented
    }
    
    /**
     * Initialize the connector.
     *
     * @param mixed $params Can be empty or not defined and a string.
     */
    public function init($params = null)
    {
        $ret = new Action();
        try {
            $ret->setResult($this->getConfig()->read($params));
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }
    
    /**
     * Returns the connector features.
     * 
     * @param mixed $params Can be empty or not defined and a string.
     */
    public function features($params = null)
    {
        $ret = new Action();
        try {
            //@todo: irgend ne supertolle feature list methode
            $featureData = file_get_contents(APP_DIR . '/../config/features.json');
            $features = json_decode($featureData, true);          

            $ret->setResult($features);
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }

    /**
     * Parse HTTP digest request
     * @param  string $str HTTP Digest request data
     * @return array|false
     */
    protected function parseHttpDigest($str)
    {
        $requiredParts = array(
            'nonce' => true,
            'nc' => true,
            'cnonce' => true,
            'qop' => true,
            'username' => true,
            'uri' => true,
            'response' => true
        );

        $data = array();
        $key = implode('|', array_keys($requiredParts));

        preg_match_all('@(' . $key . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $str, $matches, PREG_SET_ORDER);
        foreach ($matches as $m) {
            $data[$m[1]] = $m[3] ? $m[3] : $m[4];
            unset($requiredParts[$m[1]]);
        }

        return $requiredParts ? false : $data;
    }

    /**
     * Returns the connector auth action
     * 
     * @param mixed $params
     * @return \jtl\Connector\Result\Action
     */
    public function auth($params)
    {
        $realm = 'JTL-Connector';

        $configuredAuthToken = $this->getConfig()->read('auth_token');

        // Check if authentication data arrived
        if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
            $nonce = md5(uniqid());

            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate: Digest realm="' . $realm . '", qop="auth", nonce="' . $nonce . '", opaque="' . md5($realm). '"');
            exit;
        }

        // Check if we have valid authentication data
        if (!($data = $this->parseHttpDigest($_SERVER['PHP_AUTH_DIGEST'])) || ($data['username'] !== 'jtl')) {
            header('HTTP/1.1 403 Forbidden');
            exit;
        }

        // Check credentials against stored auth_token
        $a1 = md5($data['username'] . ':' . $realm . ':' . $configuredAuthToken);
        $a2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
        $validResponse = md5($a1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'] . ':' . $data['qop'] . ':' . $a2);


        $action = new Action();
        // If credentials are not valid, return appropriate response
        if ($data['response'] !== $validResponse) {
            // Set 'handled' flag because the call actually IS handled
            $action->setHandled(true);

            $error = new Error();
            $error->setCode(790);
            $error->setMessage("Could not authenticate access to the connector");
            $action->setError($error);
            return $action;
        }

        if (Application::$session !== null) {
            $session = new \stdClass();
            $session->sessionId = Application::$session->getSessionId();
            $session->lifetime = Application::$session->getLifetime();
            
            $action->setResult($session)
                ->setHandled(true);
        }
        else {
            $error = new Error();
            $error->setCode(789)
                ->setMessage("Could not get any Session");
            $action->setError($error);
        }
        
        return $action;
    }
}
?>