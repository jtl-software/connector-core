<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Application\Error\ErrorCodesInterface;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Exception\MissingRequirementException;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\System\Check;
use Jtl\Connector\Core\Result\Action;
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
     * @param null $params
     * @return bool
     * @throws MissingRequirementException
     */
    public function init($params = null)
    {
        Check::run();
        return true;
    }

    /**
     * @param null $params
     * @return Features
     */
    public function features($params = null)
    {
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

        return Features::create($entities, $flags);
    }

    /**
     * @param null $params
     * @return bool
     * @throws LinkerException
     */
    public function ack($params = null)
    {
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

        return true;
    }

    /**
     * @param $params
     * @return bool|\stdClass
     * @throws \Exception
     */
    public function auth($params)
    {
        $decodedParams = Json::decode($params);

        if (!isset($decodedParams->token)) {
            throw new \Exception("Token parameter is missing.");
        }

        $accessToken = $decodedParams->token;
        $tokenValidator = $this->application->getEndpointConnector()->getTokenValidator();

        if ($tokenValidator->validate($accessToken) === false) {
            //return $this->unauthorizedAccessError($action, $accessToken);
            Logger::write(sprintf("Unauthorized access with token (%s) from ip (%s)", $accessToken, $_SERVER['REMOTE_ADDR']), Logger::WARNING, Logger::CHANNEL_SECURITY);
            return false;
        }

        if ($this->application->getSessionHandler() !== null) {
            $session = new \stdClass();
            $session->sessionId = session_id();
            $session->lifetime = (int)ini_get('session.gc_maxlifetime');

            return $session;
        }

        $errorMessage = 'Could not get any Session';
        Logger::write($errorMessage, Logger::ERROR, Logger::CHANNEL_GLOBAL);
        throw new ApplicationException($errorMessage, ErrorCodesInterface::SESSION_ERROR);
    }

    /**
     * @return Action
     */
    public function debug()
    {
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

        return $config;
    }

    /**
     * @return Action
     */
    public function logs()
    {
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

        return $log;

    }
}
