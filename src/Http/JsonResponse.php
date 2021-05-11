<?php
namespace Jtl\Connector\Core\Http;

use Jawira\CaseConverter\CaseConverterException;
use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse as SymfonyJsonResponse;

class JsonResponse extends SymfonyJsonResponse implements LoggerAwareInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * JsonResponse constructor.
     * @param EventDispatcher $eventDispatcher
     * @param Serializer $serializer
     * @param null $data
     * @param int $status
     * @param array $headers
     * @param bool $json
     */
    public function __construct(EventDispatcher $eventDispatcher, Serializer $serializer, $data = null, int $status = 200, array $headers = [], bool $json = false)
    {
        $this->logger = new NullLogger();
        $this->eventDispatcher = $eventDispatcher;
        $this->serializer = $serializer;
        parent::__construct($data, $status, $headers, $json);
    }

    /**
     * @param RequestPacket $requestPacket
     * @param ResponsePacket $responsePacket
     * @return JsonResponse
     * @throws DefinitionException
     * @throws CaseConverterException
     */
    public function prepareAndSend(RequestPacket $requestPacket, ResponsePacket $responsePacket)
    {
        $method = Method::createFromRpcMethod($requestPacket->getMethod());
        $responseData = $responsePacket->toArray($this->serializer);
        $dataIndex = $responsePacket->getError() !== null ? 'error' : 'result';
        $event = new RpcEvent($responseData[$dataIndex] ?? [], $method->getController(), $method->getAction());
        $this->eventDispatcher->dispatch($event, Event::createRpcEventName(Event::AFTER));
        $responseData[$dataIndex] = $event->getData();
        $this->setData($responseData);
        $this->logger->debug($this->content);
        return $this->send();
    }


    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
