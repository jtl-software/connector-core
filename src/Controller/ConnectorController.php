<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jawira\CaseConverter\CaseConverterException;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Definition\RelationType;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\MissingRequirementException;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\ConnectorIdentification;
use Jtl\Connector\Core\Model\ConnectorServerInfo;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Identities;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\System\Check;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Checksum\ChecksumInterface;
use Jtl\Connector\Core\Utilities\Str;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Base Config Controller
 *
 * @access public
 */
class ConnectorController implements LoggerAwareInterface
{
    /**
     * @var string
     */
    protected $featuresPath;

    /**
     * @var ChecksumLinker
     */
    protected $checksumLinker;

    /**
     * @var IdentityLinker
     */
    protected $linker;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var \SessionHandlerInterface
     */
    protected $sessionHandler;

    /**
     * @var TokenValidatorInterface
     */
    protected $tokenValidator;

    /**
     * ConnectorController constructor.
     * @param string $featuresPath
     * @param ChecksumLinker $checksumLinker
     * @param IdentityLinker $linker
     * @param \SessionHandlerInterface $sessionHandler
     * @param TokenValidatorInterface $tokenValidator
     */
    public function __construct(
        string $featuresPath,
        ChecksumLinker $checksumLinker,
        IdentityLinker $linker,
        \SessionHandlerInterface $sessionHandler,
        TokenValidatorInterface $tokenValidator
    ) {
        $this->featuresPath = $featuresPath;
        $this->checksumLinker = $checksumLinker;
        $this->linker = $linker;
        $this->logger = new NullLogger();
        $this->sessionHandler = $sessionHandler;
        $this->tokenValidator = $tokenValidator;
    }


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
        $features = $this->fetchFeaturesData();

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
     * @throws CaseConverterException
     * @throws \ReflectionException
     */
    public function ack(Ack $ack): bool
    {
        foreach ($ack->getIdentities() as $modelName => $identities) {
            $normalizedName = Str::toPascalCase($modelName);
            if (!Model::isModel($normalizedName)) {
                $this->logger->warning('ACK: Unknown core entity ({name})! Skipping related ack\'s...', ['name' => $normalizedName]);
                continue;
            }

            foreach ($identities as $identity) {
                $this->linker->save($identity->getEndpoint(), $identity->getHost(), $normalizedName);
            }
        }

        // Checksum linking
        foreach ($ack->getChecksums() as $checksum) {
            if ($checksum instanceof ChecksumInterface) {
                if (!$this->checksumLinker->save($checksum)) {
                    $context = [
                        'endpoint' => $checksum->getForeignKey()->getEndpoint(),
                        'host' => $checksum->getForeignKey()->getHost(),
                        'type' => $checksum->getType(),
                    ];

                    $this->logger->warning('Could not save checksum for endpoint ({endpoint}), host ({host}) and type ({type})', $context);
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

        if ($this->tokenValidator->validate($auth->getToken()) === false) {
            $context = ['token' => $auth->getToken(), 'ip' => $_SERVER['REMOTE_ADDR']];
            $this->logger->warning('Unauthorized access with token ({token}) from ip ({ip})', $context);
            throw AuthenticationException::failed();
        }

        if ($this->sessionHandler === null) {
            $this->logger->error('Could not get any Session');
            throw ApplicationException::noSession();
        }

        return (new Session())
            ->setSessionId(session_id())
            ->setLifetime((int)ini_get('session.gc_maxlifetime'));
    }

    /**
     * @param ConnectorInterface $endpointConnector
     * @return ConnectorIdentification
     */
    public function identify(ConnectorInterface $endpointConnector): ConnectorIdentification
    {
        $returnBytes = function ($data): int {
            $data = trim($data);
            $len = strlen($data);
            if ($data == '-1'){
                return (int)$data;
            }
            $value = substr($data, 0, $len - 1);
            $unit = strtolower(substr($data, $len - 1));
            switch ($unit) {
                case 'g':
                    $value *= 1024;
                    break;
                case 'k':
                    $value /= 1024;
                    break;
            }
            return (int)round($value);
        };

        $serverInfo = (new ConnectorServerInfo())
            ->setMemoryLimit($returnBytes(ini_get('memory_limit')))
            ->setExecutionTime((int)ini_get('max_execution_time'))
            ->setPostMaxSize($returnBytes(ini_get('post_max_size')))
            ->setUploadMaxFilesize($returnBytes(ini_get('upload_max_filesize')));

        $connector = (new ConnectorIdentification())
            ->setEndpointVersion($endpointConnector->getEndpointVersion())
            ->setPlatformName($endpointConnector->getPlatformName())
            ->setPlatformVersion($endpointConnector->getPlatformVersion())
            ->setProtocolVersion(Application::PROTOCOL_VERSION)
            ->setServerInfo($serverInfo);

        return $connector;
    }

    /**
     * @return bool
     */
    public function finish(): bool
    {
        if (session_status() === \PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        return true;
    }

    /**
     * @param Identities|null $identities
     * @return bool
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function clear(Identities $identities = null)
    {
        if (!is_null($identities) && count($identities->getIdentities()) > 0) {
            $identities = $identities->getIdentities();
            foreach ($identities as $relationType => $relationIdentities) {
                if (empty($relationIdentities)) {
                    $this->linker->clear(RelationType::getIdentityType($relationType));
                } elseif (is_array($relationIdentities)) {
                    foreach ($relationIdentities as $identity) {
                        $endpointId = empty($identity->getEndpoint()) ? null : $identity->getEndpoint();
                        $this->linker->delete(RelationType::getModelName($relationType), $endpointId, $identity->getHost());
                    }
                }
            }
        } else {
            $this->linker->clear();
        }

        return true;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    protected function fetchFeaturesData(): array
    {
        return Json::decode(file_get_contents($this->featuresPath), true);
    }
}
