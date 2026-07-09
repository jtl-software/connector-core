<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Utilities;

use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Exception\RateLimitException;
use Jtl\Connector\Core\Logger\LoggerService;
use Psr\Log\LoggerInterface;
use RuntimeException;

class RateLimiter
{
    private const string STORAGE_DIR            = 'var/rate_limits';
    private const int    DEFAULT_WINDOW_SECONDS = 60;

    private string          $storagePath;
    private LoggerInterface $logger;
    private int             $generalLimit  = 60;
    private int             $authLimit     = 5;
    private int             $windowSeconds = self::DEFAULT_WINDOW_SECONDS;
    /** @var array<string, int> */
    private array $methodLimitOverrides = [];

    /**
     * @param string        $connectorDir
     * @param LoggerService $loggerService
     *
     * @throws RuntimeException
     */
    public function __construct(string $connectorDir, LoggerService $loggerService)
    {
        $this->storagePath = \sprintf('%s/%s', $connectorDir, self::STORAGE_DIR);
        $this->logger      = $loggerService->get(LoggerService::CHANNEL_GLOBAL);

        if (!\is_dir($this->storagePath)) {
            if (!@\mkdir($this->storagePath, 0o777, true) && !\is_dir($this->storagePath)) {
                throw new RuntimeException(
                    \sprintf('Could not create rate limit storage directory: %s', $this->storagePath)
                );
            }
        }
    }

    /**
     * @param string      $rpcMethod
     * @param string|null $identifier
     *
     * @return void
     * @throws RateLimitException
     */
    public function checkLimit(string $rpcMethod, ?string $identifier = null): void
    {
        $identifier = $identifier ?? $this->getClientIdentifier();
        $limit      = $this->getLimitForMethod($rpcMethod);
        $requests   = $this->getRequestCount($identifier, $rpcMethod);

        if ($requests >= $limit) {
            $this->logger->warning(
                'Rate limit exceeded',
                ['method' => $rpcMethod, 'identifier' => $identifier, 'limit' => $limit, 'count' => $requests]
            );
            throw new RateLimitException($rpcMethod, $this->windowSeconds);
        }
    }

    /**
     * @param string      $rpcMethod
     * @param string|null $identifier
     *
     * @return void
     * @throws RuntimeException
     */
    public function recordRequest(string $rpcMethod, ?string $identifier = null): void
    {
        $identifier = $identifier ?? $this->getClientIdentifier();
        $key        = $this->getStorageKey($identifier, $rpcMethod);
        $file       = \sprintf('%s/%s.json', $this->storagePath, \md5($key));

        $data = [];
        if (\file_exists($file)) {
            $content = \file_get_contents($file);
            if ($content === false) {
                throw new RuntimeException(\sprintf('Could not read rate limit file: %s', $file));
            }
            $decoded = \json_decode($content, true);
            if (!\is_array($decoded)) {
                $decoded = [];
            }
            $data = $decoded;
        }

        $now = \time();

        // Alte Einträge außerhalb des Fensters entfernen
        $data = \array_filter($data, fn ($ts) => $now - (int)$ts < $this->windowSeconds);

        // Neuen Request hinzufügen
        $data[] = $now;

        $encoded = \json_encode($data);
        if ($encoded === false) {
            throw new RuntimeException('Could not encode rate limit data');
        }

        if (\file_put_contents($file, $encoded) === false) {
            throw new RuntimeException(\sprintf('Could not write rate limit file: %s', $file));
        }
    }

    /**
     * @return void
     */
    public function cleanup(): void
    {
        if (!\is_dir($this->storagePath)) {
            return;
        }

        $now   = \time();
        $files = \glob(\sprintf('%s/*.json', $this->storagePath));

        if ($files === false) {
            return;
        }

        foreach ($files as $file) {
            $content = \file_get_contents($file);
            if ($content === false) {
                continue;
            }

            $data = \json_decode($content, true);
            if (!\is_array($data)) {
                @\unlink($file);
                continue;
            }

            // Alte Einträge entfernen
            $data = \array_filter($data, fn ($ts) => $now - (int)$ts < $this->windowSeconds);

            if (empty($data)) {
                @\unlink($file);
                continue;
            }

            $encoded = \json_encode($data);
            if ($encoded !== false) {
                \file_put_contents($file, $encoded);
            }
        }
    }

    /**
     * @param string $identifier
     * @param string $rpcMethod
     *
     * @return int
     */
    private function getRequestCount(string $identifier, string $rpcMethod): int
    {
        $key  = $this->getStorageKey($identifier, $rpcMethod);
        $file = \sprintf('%s/%s.json', $this->storagePath, \md5($key));

        if (!\file_exists($file)) {
            return 0;
        }

        $content = \file_get_contents($file);
        if ($content === false) {
            return 0;
        }

        $data = \json_decode($content, true);
        if (!\is_array($data)) {
            return 0;
        }

        $now = \time();

        // Nur Requests im aktuellen Fenster zählen
        return \count(\array_filter($data, fn ($ts) => $now - (int)$ts < $this->windowSeconds));
    }

    /**
     * @param string $rpcMethod
     *
     * @return int
     */
    private function getLimitForMethod(string $rpcMethod): int
    {
        if (isset($this->methodLimitOverrides[$rpcMethod])) {
            return $this->methodLimitOverrides[$rpcMethod];
        }

        // Niedrigeres Limit für Auth (Brute-Force Schutz)
        return $rpcMethod === RpcMethod::AUTH
            ? $this->authLimit
            : $this->generalLimit;
    }

    /**
     * @return string
     */
    private function getClientIdentifier(): string
    {
        return (string)($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown');
    }

    /**
     * @param string $identifier
     * @param string $rpcMethod
     *
     * @return string
     */
    private function getStorageKey(string $identifier, string $rpcMethod): string
    {
        return \sprintf('%s:%s', $identifier, $rpcMethod);
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function setGeneralLimit(int $limit): self
    {
        $this->generalLimit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getGeneralLimit(): int
    {
        return $this->generalLimit;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function setAuthLimit(int $limit): self
    {
        $this->authLimit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthLimit(): int
    {
        return $this->authLimit;
    }

    /**
     * @param int $seconds
     *
     * @return $this
     */
    public function setWindowSeconds(int $seconds): self
    {
        $this->windowSeconds = $seconds;
        return $this;
    }

    /**
     * @return int
     */
    public function getWindowSeconds(): int
    {
        return $this->windowSeconds;
    }

    /**
     * @param array<string, int> $overrides
     *
     * @return $this
     */
    public function setMethodLimitOverrides(array $overrides): self
    {
        $this->methodLimitOverrides = $overrides;
        return $this;
    }

    /**
     * @return array<string, int>
     */
    public function getMethodLimitOverrides(): array
    {
        return $this->methodLimitOverrides;
    }
}
