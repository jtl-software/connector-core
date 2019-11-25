<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Exception\MissingRequirementException;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\System\Check;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Checksum\ChecksumInterface;

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
     * @param Ack $ack
     * @return bool
     * @throws DefinitionException
     */
    public function ack(Ack $ack): bool
    {
        foreach ($ack->getIdentities() as $modelName => $identities) {
            $normalizedName = Model::normalizeName($modelName);
            if (!Model::isModel($normalizedName)) {
                Logger::write(sprintf(
                    'ACK: Unknown core entity (%s)! Skipping related ack\'s...',
                    $normalizedName
                ), Logger::WARNING);
                continue;
            }

            foreach ($identities as $identity) {
                $this->application->getLinker()->save($identity->getEndpoint(), $identity->getHost(), $normalizedName);
            }
        }

        if (ChecksumLinker::checksumLoaderExists()) {
            // Checksum linking
            foreach ($ack->getChecksums() as $checksum) {
                if ($checksum instanceof ChecksumInterface) {
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
     * @param Authentication $auth
     * @return Session
     * @throws ApplicationException
     * @throws AuthenticationException
     */
    public function auth(Authentication $auth)
    {
        if (empty($auth->getToken())) {
            throw AuthenticationException::tokenMissing();
        }

        $tokenValidator = $this->application->getEndpointConnector()->getTokenValidator();
        if ($tokenValidator->validate($auth->getToken()) === false) {
            Logger::write(sprintf("Unauthorized access with token (%s) from ip (%s)", $auth->getToken(), $_SERVER['REMOTE_ADDR']), Logger::WARNING);
            throw AuthenticationException::failed();
        }

        if ($this->application->getSessionHandler() === null) {
            $errorMessage = 'Could not get any Session';
            Logger::write($errorMessage, Logger::ERROR);
            throw new ApplicationException($errorMessage, ErrorCode::SESSION_ERROR);

        }

        return (new Session())
            ->setSessionId(session_id())
            ->setLifetime((int)ini_get('session.gc_maxlifetime'))
        ;
    }

    /**
     * @return mixed
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
     * @return array
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
