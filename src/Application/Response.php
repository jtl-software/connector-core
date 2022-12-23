<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Application;

class Response
{
    /** @var mixed */
    protected $result;

    /**
     * Response constructor.
     *
     * @param mixed $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * @param mixed $result
     *
     * @return Response
     */
    public static function create($result): Response
    {
        return new self($result);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     *
     * @return Response
     */
    public function setResult($result): Response
    {
        $this->result = $result;
        return $this;
    }
}
