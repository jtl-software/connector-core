<?php

namespace Jtl\Connector\Core\Subscriber;

use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Serializer\Json;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductTransform
 * @package Jtl\Connector\Core\Subscriber
 */
abstract class ProductTransform implements EventSubscriberInterface
{
    /**
     * @var Serializer
     */
    protected $serializer = null;

    /**
     * @var Request
     */
    protected $jtlRpc = null;

    /**
     * ProductTransform constructor.
     * @param Serializer $serializer
     * @param string $jtlRpc
     */
    public function __construct(Serializer $serializer, string $jtlRpc)
    {
        $this->serializer = $serializer;
        $this->jtlRpc = Json::decode($jtlRpc, true);
    }

    /**
     * @param RequestEvent $event
     */
    public function swapRequestParams(RequestEvent $event)
    {
        $request = $event->getRequest();
        $models = $request->getParams();

        $event->getRequest()->setParams(
            $this->transformToProductModels(...$models)
        );
    }

    /**
     * @param Product $product
     */
    protected function assignAdditionalProperties(Product $product)
    {
        foreach ($this->jtlRpc['params'] as $i => $paramArray) {
            foreach ($paramArray as $paramName => $paramValue) {
                $setter = sprintf('set%s', ucfirst($paramName));
                if (in_array($paramName, $this->getAdditionalPropertiesToAssign(), true) && method_exists($product, $setter)) {
                    if ($paramName === 'taxClassId') {
                        list($endpointId, $hostId) = $paramValue;
                        $paramValue = new Identity($endpointId, $hostId);
                    }
                    $product->$setter($paramValue);
                }
            }
        }
    }

    /**
     * @param AbstractDataModel ...$models
     * @return array
     */
    abstract protected function transformToProductModels(AbstractDataModel ...$models): array;

    /**
     * @return array
     */
    abstract protected function getAdditionalPropertiesToAssign(): array;
}
