<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;

class RateLimitException extends \Exception
{
    private int $retryAfter;

    /**
     * @param string $identifier
     * @param int    $retryAfter
     */
    public function __construct(string $identifier, int $retryAfter = 60)
    {
        $this->retryAfter = $retryAfter;
        parent::__construct(
            \sprintf('Rate limit exceeded for %s. Retry after %d seconds', $identifier, $retryAfter),
            ErrorCode::RATE_LIMIT_EXCEEDED
        );
    }

    /**
     * @return int
     */
    public function getRetryAfter(): int
    {
        return $this->retryAfter;
    }
}
