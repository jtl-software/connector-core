<?php
namespace Jtl\Connector\Core\Application;

class Request
{
    protected string $controller;
    protected string $action;
    /** @var mixed[]  */
    protected array $params = [];

    /**
     * Request constructor.
     * @param string $controller
     * @param string $action
     * @param mixed[] $params
     */
    public function __construct(string $controller, string $action, array $params)
    {
        $this->controller = $controller;
        $this->action     = $action;
        $this->params     = $params;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return mixed[]
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param mixed[] $params
     * @return Request
     */
    public function setParams(array $params): Request
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param string $controller
     * @param string $action
     * @param mixed[] $params
     * @return Request
     */
    public static function create(string $controller, string $action, array $params): Request
    {
        return new self($controller, $action, $params);
    }
}
