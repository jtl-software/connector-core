<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

use Throwable;

class MustNotBeNullException extends \RuntimeException
{
    public function __construct($message = 'variable must not be null.', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @param string $varName
     *
     * @return self
     */
    public static function fromVarName(string $varName): self
    {
        return new self($varName . ' must not be null!');
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public static function fromExpectedType(string $type): self
    {
        return new self($type . ' expected, but null given.');
    }
}
