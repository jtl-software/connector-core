<?php


namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

class DataEvent extends Event
{
    /**
     * @var mixed[]
     */
    protected $data;

    /**
     * DataEvent constructor.
     * @param array $data
     */
    public function __construct(array &$data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param mixed[] $data
     * @return DataEvent
     */
    public function setData(array $data): DataEvent
    {
        $this->data = $data;
        return $this;
    }
}
