<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Application\Error\ErrorCodesInterface;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\System\Check;
use Jtl\Connector\Core\Result\Action;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Serializer\JMS\SerializerBuilder;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Checksum\IChecksum;

/**
 * Base Config Controller
 *
 * @access public
 */
class Connector extends AbstractController
{
    /**
     * Initialize the connector.
     *
     * @param mixed $params Can be empty or not defined and a string.
     * @return Action
     */
    public function init($params = null)
    {
        $ret = new Action();

        try {
            Check::run();

            $ret->setResult(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }

        return $ret;
    }

    /**
     * @param null $params
     * @return Action
     */
    public function features($params = null)
    {
        $action = new Action();
        try {
            $featureData = file_get_contents(CONNECTOR_DIR . '/config/features.json');
            $features = Json::decode($featureData, true);

            $entities = [];
            if (isset($features['entities']) && is_array($features['entities'])) {
                $entities = $features['entities'];
            }

            $flags = [];
            if (isset($features['flags']) && is_array($features['flags'])) {
                $flags = $features['flags'];
            }

            $action->setResult(Features::create($entities, $flags));
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $action->setError($err);
        }

        return $action;
    }

    /**
     * Ack Identity Mappings
     *
     * @param mixed $params empty or ack json string.
     * @return Action
     */
    public function ack($params = null)
    {
        $ret = new Action();

        try {
            $serializer = SerializerBuilder::create();
            $ack = $serializer->deserialize($params, Ack::class, 'json');
            $identityLinker = IdentityLinker::getInstance();

            foreach ($ack->getIdentities() as $modelName => $identities) {
                if (!$identityLinker->isType($modelName)) {
                    Logger::write(sprintf(
                        'ACK: Unknown core entity (%s)! Skipping related ack\'s...',
                        $modelName
                    ), Logger::WARNING);
                    continue;
                }

                foreach ($identities as $identity) {
                    $identityLinker->save($identity->getEndpoint(), $identity->getHost(), $modelName);
                }
            }

            if (ChecksumLinker::checksumLoaderExists()) {
                // Checksum linking
                foreach ($ack->getChecksums() as $checksum) {
                    if ($checksum instanceof IChecksum) {
                        if (!ChecksumLinker::save($checksum)) {
                            Logger::write(sprintf(
                                'Could not save checksum for endpoint (%s), host (%s) and type (%s)',
                                $checksum->getForeignKey()->getEndpoint(),
                                $checksum->getForeignKey()->getHost(),
                                $checksum->getType()
                            ), Logger::WARNING, Logger::CHANNEL_CHECKSUM);
                        }
                    }
                }
            }

            $ret->setResult(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }

        return $ret;
    }

    /**
     * Returns the connector auth action
     *
     * @param mixed $params
     * @return Action
     */
    public function auth($params)
    {
        $action = new Action();

        try {
            $decodedParams = Json::decode($params);

            if (!isset($decodedParams->token)) {
                throw new \Exception("Token parameter is missing.");
            }

            $accessToken = $decodedParams->token;
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $action->setError($err);

            return $action;
        }

        $tokenValidator = $this->application->getConnector()->getTokenValidator();

        if ($tokenValidator->validate($accessToken) === false) {
            return $this->unauthorizedAccessError($action, $accessToken);
        }

        if ($this->application->getSessionHandler() !== null) {
            $session = new \stdClass();
            $session->sessionId = session_id();
            $session->lifetime = (int)ini_get('session.gc_maxlifetime');

            $action->setResult($session);
        } else {
            $error = new Error();
            $error->setCode(ErrorCodesInterface::UNDEFINED_SESSION_HANDLER_ERROR)
                ->setMessage("Could not get any Session");
            $action->setError($error);
        }

        return $action;
    }

    /**
     * @return Action
     */
    public function debug()
    {
        $action = new Action();

        try {
            $path = Path::combine(CONNECTOR_DIR, 'config', 'config.json');
            $configData = file_get_contents($path);
            if ($configData === false) {
                throw new \RuntimeException(sprintf('Cannot read config file %s', $path));
            }

            $config = Json::decode($configData);

            $status = false;
            if (!isset($config->developer_logging) || !$config->developer_logging) {
                $status = true;
            }

            $config->developer_logging = $status;

            $json = Json::encode($config, JSON_PRETTY_PRINT);
            file_put_contents($path, $json);

            $action->setResult($config);
        } catch (\Exception $e) {
            $error = new Error();
            $error->setCode($e->getCode());
            $error->setMessage($e->getMessage());
            $action->setError($error);
        }

        return $action;
    }

    /**
     * @return Action
     */
    public function logs()
    {
        $action = new Action();

        try {
            $log = [];
            foreach (glob(Path::combine(CONNECTOR_DIR, 'logs', '*.log')) as $file) {
                if (!preg_match('/(global|database){1}.+\.log/', $file)) {
                    continue;
                }

                $lines = array_filter(explode(PHP_EOL, file_get_contents($file)), function ($elem) {
                    return !empty(trim($elem));
                });

                $log = array_merge($log, $lines);
            }

            $action->setResult($log);
        } catch (\Exception $e) {
            $error = new Error();
            $error->setCode($e->getCode());
            $error->setMessage($e->getMessage());
            $action->setError($error);
        }

        return $action;
    }

    /**
     * @param Action $action
     * @param string $accessToken
     * @return Action
     */
    protected function unauthorizedAccessError(Action $action, string $accessToken): Action
    {
        $error = new Error();
        $error->setCode(ErrorCodesInterface::AUTHENTICATION_ERROR);
        $error->setMessage("Could not authenticate access to the connector");
        $action->setError($error);

        Logger::write(sprintf("Unauthorized access with token (%s) from ip (%s)", $accessToken, $_SERVER['REMOTE_ADDR']), Logger::WARNING, Logger::CHANNEL_SECURITY);

        return $action;
    }
}
