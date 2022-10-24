<?php

namespace Jtl\Connector\Core\Test\Serializer\Subscriber;

use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\ManufacturerImage;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;

class ImageSubscriberTest extends TestCase
{
    public function testOnPostSerialize()
    {
        $endpoint         = $this->getFaker()->word;
        $expectedEndpoint = \sprintf('manufacturer#=#%s', $endpoint);
        $expectedHost     = 123;
        $image            = (new ManufacturerImage())->setId(new Identity($endpoint, $expectedHost));
        /** @var Serializer $serializer */
        $serializer = SerializerBuilder::create()->build();
        $data       = $serializer->toArray($image);
        $this->assertEquals($expectedEndpoint, $data['id'][0]);
        $this->assertEquals($expectedHost, $data['id'][1]);
    }

    public function testOnPostDeserialize()
    {
        $data = [
            'identities' => [
                'image' => [
                    [
                        'category#=#yolo123',
                        42,
                    ],
                    [
                        'manufacturer#=#yummy',
                        23,
                    ],
                ],
            ],
        ];
        /** @var Serializer $serializer */
        $serializer = SerializerBuilder::create()->build();
        $ack        = $serializer->fromArray($data, Ack::class);
        $identities = $ack->getIdentities();
        $this->assertArrayHasKey('categoryImage', $identities);
        $this->assertCount(1, $identities['categoryImage']);
        $this->assertEquals('yolo123', $identities['categoryImage'][0]->getEndpoint());
        $this->assertEquals(42, $identities['categoryImage'][0]->getHost());
        $this->assertArrayHasKey('manufacturerImage', $identities);
        $this->assertCount(1, $identities['manufacturerImage']);
        $this->assertEquals('yummy', $identities['manufacturerImage'][0]->getEndpoint());
        $this->assertEquals(23, $identities['manufacturerImage'][0]->getHost());
    }
}
