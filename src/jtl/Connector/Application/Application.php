<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Application;

use \jtl\Connector\Core\Serializer\Json;
use \jtl\Connector\Core\Application\Application as CoreApplication;
use \jtl\Connector\Core\Exception\RpcException;
use \jtl\Connector\Core\Exception\SessionException;
use \jtl\Connector\Core\Exception\ConnectorException;
use \jtl\Connector\Core\Exception\ApplicationException;
use \jtl\Connector\Core\Rpc\Handler;
use \jtl\Connector\Core\Rpc\Packet;
use \jtl\Connector\Core\Rpc\RequestPacket;
use \jtl\Connector\Core\Rpc\ResponsePacket;
use \jtl\Connector\Core\Rpc\Error;
use \jtl\Connector\Core\Http\Request;
use \jtl\Connector\Core\Http\Response;
use \jtl\Connector\Core\Config\Config;
use \jtl\Connector\Core\Config\Loader\Json as ConfigJson;
use \jtl\Connector\Core\Config\Loader\System as ConfigSystem;
use \jtl\Connector\Result\Action;
use \jtl\Connector\Core\Validator\Schema;
use \jtl\Connector\Core\Exception\SchemaException;
use \jtl\Connector\Core\Validator\ValidationException;
use \jtl\Connector\Database\Sqlite3;
use \jtl\Connector\Core\Utilities\RpcMethod;
use \jtl\Connector\Session\Session;
use \jtl\Connector\Base\Connector;
use \jtl\Connector\Core\Logger\Logger;
use \Doctrine\Common\Annotations\AnnotationRegistry;
use \jtl\Connector\Core\Rpc\Method;
use \jtl\Connector\Linker\IdentityLinker;
use \jtl\Connector\Model\DataModel;
use \Doctrine\Common\Collections\ArrayCollection;
use \jtl\Connector\Serializer\JMS\SerializerBuilder;

/**
 * Application Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Application extends CoreApplication
{

    /**
     * Connected EndpointConnectors
     *
     * @var IEndpointConnector
     */
    protected $connector = null;

    /**
     * @var \jtl\connector\Core\Config\Config;
     */
    protected $config;

    /**
     * Global Session
     *
     * @var \jtl\Connector\Session\Session
     */
    protected $session;

    protected function __construct()
    {
        require_once(dirname(__FILE__) . '/../bootstrap.php');
    }

    /**
     * (non-PHPdoc)
     *
     * @see \jtl\Connector\Core\Application\Application::run()
     */
    public function run()
    {
        AnnotationRegistry::registerLoader('class_exists');

        $jtlrpc = Request::handle();
        $sessionId = Request::getSession();
        $requestpackets = RequestPacket::build($jtlrpc);

        Logger::write(Json::encode($requestpackets->getPublic()), Logger::DEBUG, 'rpc');

        $rpcmode = is_object($requestpackets) ? Packet::SINGLE_MODE : Packet::BATCH_MODE;

        $method = null;
        if ($rpcmode == Packet::SINGLE_MODE) {
            $method = $requestpackets->getMethod();
        }

        // Start Session
        $this->startSession($sessionId, $method);

        // Start Configuration
        $this->startConfiguration();

        // Initialize Endpoint
        $this->connector->initialize();

        if ($this->connector === null) {
            throw new ApplicationException('No connector registed');
        }

        if ($this->connector->getPrimaryKeyMapper() === null) {
            throw new ApplicationException('No primary key mapper registed');
        }

        if ($this->connector->getTokenLoader() === null) {
            throw new ApplicationException('No token loader registed');
        }

        switch ($rpcmode) {
            case Packet::SINGLE_MODE:
                $this->runSingle($requestpackets, $this->config, $rpcmode);
                break;
            case Packet::BATCH_MODE:
                $this->runBatch($requestpackets, $this->config, $rpcmode);
                break;
        }
    }

    /**
     * Execute RPC Method
     *
     * @param RequestPacket $requestpacket
     * @param Config $config
     * @param integer $rpcmode
     * @throws RpcException
     * @return \jtl\Connector\Core\Rpc\ResponsePacket
     */
    protected function execute(RequestPacket $requestpacket, Config $config, $rpcmode, $imagePath = null)
    {
        if (!RpcMethod::isMethod($requestpacket->getMethod())) {
            throw new RpcException('Invalid Request', -32600);
        }

        $identityLinker = IdentityLinker::getInstance();
        $identityLinker->setPrimaryKeyMapper($this->connector->getPrimaryKeyMapper());

        ////////////////////
        // Core Connector //
        ////////////////////
        $coreconnector = Connector::getInstance();
        $method = RpcMethod::splitMethod($requestpacket->getMethod());
        $coreconnector->setMethod($method);
        if ($method->isCore() && $coreconnector->canHandle()) {
            $coreconnector->setConfig($config);
            $actionresult = $coreconnector->handle($requestpacket);
            if ($actionresult->isHandled()) {
                $responsepacket = $this->buildRpcResponse($requestpacket, $actionresult);

                if ($rpcmode == Packet::SINGLE_MODE) {
                    Response::send($responsepacket);
                } else {
                    return $responsepacket;
                }
            }
        }

        ////////////////////////
        // Endpoint Connector //
        ////////////////////////
        $exists = false;

        $this->deserializeRequestParams($requestpacket, $this->connector->getModelNamespace());

        // Image?
        if ($requestpacket->getMethod() === 'image.push' && $imagePath !== null) {
            if ($imagePath !== null) {
                $image = $requestpacket->getParams();
                $image->setFilename($imagePath);
                $requestpacket->setParams($image);
            } else {
                throw new ConnectorException('Could not handle fileupload (no file was uploaded via HTTP POST?)');
            }
        }

        $this->connector->setMethod($method);
        if ($this->connector->canHandle()) {
            $this->connector->setConfig($config);
            $actionresult = $this->connector->handle($requestpacket);
            
            if ($requestpacket->getMethod() === 'image.push' && $imagePath !== null) {
                Request::deleteFileupload($imagePath);
            }
            
            if (get_class($actionresult) === "jtl\\Connector\\Result\\Action") {
                $exists = true;
                if ($actionresult->isHandled()) {

                    // Identity mapping
                    $results = array();
                    foreach ($actionresult->getResult() as $model) {
                        if ($model instanceof DataModel) {
                            $identityLinker->linkModel($model, ($method->getAction() === Method::ACTION_DELETE));

                            if ($method->getAction() === Method::ACTION_PULL) {
                                $results[] = $model->getPublic();
                            }
                        }
                    }

                    if ($method->getAction() === Method::ACTION_PULL) {
                        $actionresult->setResult($results);
                    }

                    // Building response packet
                    $responsepacket = $this->buildRpcResponse($requestpacket, $actionresult);

                    if ($rpcmode == Packet::SINGLE_MODE) {
                        Response::send($responsepacket);
                    } else {
                        return $responsepacket;
                    }
                }
            } else {
                throw new RpcException('Internal error', -32603);
            }
        } else {
            if ($requestpacket->getMethod() === 'image.push') {
                Request::deleteFileupload($imagePath);
            }
        }

        if ($exists) {
            throw new RpcException('Method could not be handled', -32000);
        } else {
            throw new RpcException(
                sprintf("Method '%s' not found", $requestpacket->getMethod()),
                -32601
            );
        }
    }

    /**
     *
     * @param IEndpointConnector $endpointconnector
     */
    public function register(IEndpointConnector $endpointconnector)
    {
        $this->connector = $endpointconnector;
    }

    /**
     * Single Mode
     *
     * @param ResponsePacket $requestpacket
     * @param Config $config
     * @param integer $rpcmode
     */
    protected function runSingle(RequestPacket $requestpacket, Config $config, $rpcmode)
    {
        $requestpacket->validate();
        $this->runActionValidation($requestpacket);
        $this->runModelValidation($requestpacket);

        // Image?
        $imagePath = null;
        if ($requestpacket->getMethod() === 'image.push') {
            $imagePath = Request::handleFileupload();
        }

        try {
            $this->execute($requestpacket, $config, $rpcmode, $imagePath);
        } catch (RpcException $exc) {
            if ($requestpacket->getMethod() === 'image.push' && $imagePath !== null) {
                Request::deleteFileupload($imagePath);
            }

            $error = new Error();
            $error->setCode($exc->getCode())
              ->setMessage($exc->getMessage());

            $responsepacket = new ResponsePacket();
            $responsepacket->setId($requestpacket->getId())
              ->setJtlrpc($requestpacket->getJtlrpc())
              ->setError($error);

            Response::send($responsepacket);
        }
    }

    /**
     * Batch Mode
     *
     * @param array $requestpackets
     * @param Config $config
     * @param integer $rpcmode
     */
    protected function runBatch(array $requestpackets, Config $config, $rpcmode)
    {
        $jtlrpcreponses = array();

        foreach ($requestpackets as $requestpacket) {
            try {
                $requestpacket->validate();
                $this->runActionValidation($requestpacket);
                $this->runModelValidation($requestpacket);
                $jtlrpcreponses[] = $this->execute($requestpacket, $config, $rpcmode);
            } catch (RpcException $exc) {
                $error = new Error();
                $error->setCode($exc->getCode())
                  ->setMessage($exc->getMessage());

                $responsepacket = new ResponsePacket();
                $responsepacket->setId($requestpacket->getId())
                  ->setJtlrpc($requestpacket->getJtlrpc())
                  ->setError($error);

                $jtlrpcreponses[] = $responsepacket;
            }
        }

        Response::sendAll($jtlrpcreponses);
    }

    protected function deserializeRequestParams(RequestPacket &$requestpacket, $modelNamespace)
    {
        $method = RpcMethod::splitMethod($requestpacket->getMethod());

        $namespace = ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) ?
            sprintf('%s\%s', $modelNamespace, RpcMethod::buildController($method->getController())) : 'jtl\Connector\Core\Model\QueryFilter';

        if (class_exists("\\{$namespace}") && $requestpacket->getParams() !== null) {            
            $serializer = SerializerBuilder::create();

            // Identity mapping
            if ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) {
                $params = $serializer->deserialize($requestpacket->getParams(), "ArrayCollection<{$namespace}>", 'json');

                if (is_array($params)) {
                    $identityLinker = IdentityLinker::getInstance();
                    foreach ($params as &$param) {
                        $identityLinker->linkModel($param);
                    }
                }
            } else {
                $params = $serializer->deserialize($requestpacket->getParams(), $namespace, 'json');
            }

            $requestpacket->setParams($params);
        }
    }

    /**
     * Build RPC Reponse Packet
     *
     * @param \jtl\Connector\Core\Rpc\ResponsePacket $requestpacket
     * @param \jtl\Connector\Result\Action $actionresult
     * @return \jtl\Connector\Core\Rpc\ResponsePacket
     * @throws \jtl\Connector\Core\Exception\RpcException
     */
    protected function buildRpcResponse(RequestPacket $requestpacket, Action $actionresult)
    {
        $responsepacket = new ResponsePacket();
        $responsepacket->setId($requestpacket->getId())
          ->setJtlrpc($requestpacket->getJtlrpc())
          ->setResult($actionresult->getResult())
          ->setError($actionresult->getError());

        $responsepacket->validate();

        return $responsepacket;
    }

    /**
     * Validate Action
     *
     * @param RequestPacket $requestpacket
     * @throws SchemaException
     */
    protected function runActionValidation(RequestPacket $requestpacket)
    {
        $method = RpcMethod::splitMethod($requestpacket->getMethod());

        try {
            Schema::validateAction(__DIR__ . "/../../../../schema/{$method->getController()}/params/{$method->getAction()}.json", $requestpacket->getParams());
        } catch (ValidationException $exc) {
            throw new SchemaException($exc->getMessage());
        }
    }

    /**
     * Validate Model
     *
     * @param string $controller
     * @throws SchemaException
     */
    protected function runModelValidation(RequestPacket $requestpacket)
    {
        //        $method = RpcMethod::splitMethod($requestpacket->getMethod());
//
//        if ($method->getAction() == Method::ACTION_PUSH) {
//            $controller = str_replace("_", "", $method->getController());
//
//            try {
//                Schema::validateAction(CONNECTOR_DIR . "schema/{$controller}/{$controller}.json", $requestpacket->getParams());
//            } catch (ValidationException $exc) {
//                throw new SchemaException($exc->getMessage());
//            }
//        }
    }

    /**
     * Initialises the connector configuration instance.
     */
    protected function startConfiguration()
    {
        if (!isset($this->session)) {
            throw new SessionException('Session not initialized', -32001);
        }

        if (isset($this->config)) {
            $this->config = $this->config;
            $json = $this->config->getLoader('Json');
        } else {
            $json = new ConfigJson(CONNECTOR_DIR . '/config/config.json');
            $this->config = new Config(array(
              $json,
              new ConfigSystem()
            ));
        }

        $json->beforeRead();
        $values = $json->reads();
        $exts = array();
        $root = dirname($_SERVER['SCRIPT_FILENAME']);

        if (!isset($values['platform_root'])) { //Shop directory
            $exts['platform_root'] = realpath($root . '/../../');
            if (substr($exts['platform_root'], -1) == '/') {
                $exts['platform_root'] = substr($exts['platform_root'], 0, strlen($exts['platform_root']));
            }
        }

        if (!isset($values['connector_root'])) { //Connector directory
            $exts['connector_root'] = realpath($root . '/../');
            if (substr($exts['connector_root'], -1) == '/') {
                $exts['connector_root'] = substr($exts['connector_root'], 0, strlen($exts['connector_root']));
            }
        }

        if (!empty($exts)) {
            $json->writes($exts);
        }

        //We need to change the order of the loader
        $this->config = new Config(array($json, new ConfigSystem()));
    }

    /**
     * Starting Session
     *
     * @throws \jtl\Connector\Core\Exception\DatabaseException
     * @throws \jtl\Connector\Core\Exception\SessionException
     */
    protected function startSession($sessionId = null, $method)
    {
        if ($sessionId === null && $method !== null && $method !== 'core.connector.auth') {
            throw new SessionException('No session');
        }

        $sqlite3 = Sqlite3::getInstance();
        $sqlite3->connect(array('location' => CONNECTOR_DIR . '/db/connector.s3db'));

        $this->session = new Session($sqlite3, $sessionId);
    }

    /**
     * Connector getter
     *
     * @return IEndpointConnector
     */
    public function getConnector()
    {
        return $this->connector;
    }

    /**
     * Session getter
     *
     * @return IEndpointConnector
     */
    public function getSession()
    {
        return $this->session;
    }
}
