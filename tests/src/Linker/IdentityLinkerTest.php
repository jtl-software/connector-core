<?php

namespace Jtl\Connector\Core\Test\Linker;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductVariation;
use Jtl\Connector\Core\Model\ProductWarehouseInfo;
use Jtl\Connector\Core\Model\ShippingClass;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class IdentityLinkerTest
 * @package Jtl\Connector\Core\Linker
 */
class IdentityLinkerTest extends TestCase
{
    /**
     * @dataProvider hostIdDataProvider
     *
     * @param $hostId
     * @param $shouldBeValid
     */
    public function testHostIdValidator($hostId, $shouldBeValid)
    {
        $isValid = $this->createLinker()->isValidHostId($hostId);

        $this->assertEquals($shouldBeValid, $isValid);
    }

    /**
     * @param $mockedPrimaryKeyMapper
     *
     * @return IdentityLinker
     */
    protected function createLinker($mockedPrimaryKeyMapper = null)
    {
        if ($mockedPrimaryKeyMapper === null) {
            $mockedPrimaryKeyMapper = $this->createPrimaryKeyMapperMock();
        }
        return new IdentityLinker($mockedPrimaryKeyMapper);
    }

    /**
     * @param array $hostId
     * @param array $endpointId
     *
     * @return PrimaryKeyMapperInterface|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    public function createPrimaryKeyMapperMock($hostId = [1], $endpointId = ["1"])
    {
        $primaryKeyMapper = \Mockery::mock(PrimaryKeyMapperInterface::class);
        $primaryKeyMapper->shouldReceive('save')->andReturnTrue();
        $primaryKeyMapper->shouldReceive('delete')->andReturnTrue();
        $primaryKeyMapper->shouldReceive('clear')->andReturnTrue();
        $primaryKeyMapper->shouldReceive('getHostId')->andReturn(...$hostId);
        $primaryKeyMapper->shouldReceive('getEndpointId')->andReturn(...$endpointId);

        return $primaryKeyMapper;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function hostIdDataProvider()
    {
        return [
            [
                0,
                false,
            ],
            [
                null,
                false,
            ],
            [
                $this->createHostId(),
                true,
            ],
        ];
    }

    /**
     * @dataProvider endpointIdDataProvider
     *
     * @param $endpointId
     * @param $shouldBeValid
     */
    public function testEndpointIdValidator($endpointId, $shouldBeValid)
    {
        $isValid = $this->createLinker()->isValidEndpointId($endpointId);
        $this->assertEquals($shouldBeValid, $isValid);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function endpointIdDataProvider()
    {
        return [
            [
                0,
                true,
            ],
            [
                null,
                false,
            ],
            [
                $this->createEndpointId(),
                true,
            ],
        ];
    }

    /**
     * @throws \ReflectionException
     */
    public function testCache()
    {
        $linker = $this->createLinker();

        $reflection = new \ReflectionClass($linker);

        $deleteCache = $reflection->getMethod('deleteCache');
        $deleteCache->setAccessible(true);

        $saveCache = $reflection->getMethod('saveCache');
        $saveCache->setAccessible(true);

        $checkCache = $reflection->getMethod('checkCache');
        $checkCache->setAccessible(true);

        $loadCache = $reflection->getMethod('loadCache');
        $loadCache->setAccessible(true);

        $cacheType  = IdentityLinker::CACHE_TYPE_ENDPOINT;
        $type       = IdentityType::CATEGORY;
        $endpointId = $this->createEndpointId();
        $hostId     = $this->createHostId();

        $this->assertEmpty($linker->getCache());

        $saveCache->invoke($linker, $endpointId, $hostId, $type, $cacheType);
        $this->assertCount(1, $linker->getCache());

        $cacheValue = $loadCache->invoke($linker, $endpointId, $type, $cacheType);
        $this->assertEquals($hostId, $cacheValue);

        $cacheExists = $checkCache->invoke($linker, $endpointId, $type, $cacheType);
        $this->assertTrue($cacheExists);

        $cacheDoesntExists = $checkCache->invoke($linker, $endpointId, $type, IdentityLinker::CACHE_TYPE_HOST);
        $this->assertFalse($cacheDoesntExists);

        $deleteCache->invoke($linker, $type, $cacheType, $endpointId, $hostId);
        $this->assertEmpty($linker->getCache());
    }

    /**
     *
     */
    public function testHostIdResolver()
    {
        $linker = $this->createLinker();

        $hostId = $linker->getHostId(Model::CATEGORY, 'id', '1');

        $this->assertSame(1, $hostId);

        $modelName = Model::CATEGORY;
        $property  = 'property_doesnt_exists';
        $this->expectExceptionObject(DefinitionException::unknownIdentityProperty($modelName, $property));

        $linker->getHostId($modelName, $property, '30');
    }

    /**
     *
     */
    public function testEndpointIdResolver()
    {
        $linker = $this->createLinker();

        $endpointId = $linker->getEndpointId(Model::CATEGORY, 'id', 1);

        $this->assertSame("1", $endpointId);

        $modelName = Model::CATEGORY;
        $property  = 'property_doesnt_exists';
        $this->expectExceptionObject(DefinitionException::unknownIdentityProperty($modelName, $property));

        $linker->getEndpointId($modelName, $property, '30');
    }

    /**
     *
     */
    public function testIdentityClear()
    {
        $linker = $this->createLinker();

        $clearResult = $linker->clear();
        $this->assertTrue($clearResult);
    }

    /**
     *
     */
    public function testIdentitySave()
    {
        $endpointId   = $this->createEndpointId();
        $hostId       = $this->createHostId();
        $modelName    = Model::CATEGORY;
        $property     = 'parentCategoryId';
        $identityType = Model::getIdentityType($modelName);

        $linker = $this->createLinker();

        $saveResult = $linker->save($endpointId, $hostId, $modelName, $property);
        $this->assertTrue($saveResult);

        $reflection = new \ReflectionClass($linker);
        $checkCache = $reflection->getMethod('checkCache');
        $checkCache->setAccessible(true);

        $cacheExists = $checkCache->invoke($linker, $endpointId, $identityType, IdentityLinker::CACHE_TYPE_ENDPOINT);
        $this->assertTrue($cacheExists);
    }

    /**
     *
     */
    public function testIdentityDelete()
    {
        $endpointId   = $this->createEndpointId();
        $hostId       = $this->createHostId();
        $modelName    = Model::CATEGORY;
        $property     = 'id';
        $identityType = Model::getIdentityType($modelName);

        $primaryKeyMapper = $this->createPrimaryKeyMapperMock([0]);
        $linker           = $this->createLinker($primaryKeyMapper);

        $reflection = new \ReflectionClass($linker);
        $checkCache = $reflection->getMethod('checkCache');
        $checkCache->setAccessible(true);

        $linker->save($endpointId, $hostId, $modelName, $property);

        $deleteResult = $linker->delete($modelName, $endpointId, $hostId);
        $this->assertTrue($deleteResult);

        $cacheExists = $checkCache->invoke($linker, $endpointId, $identityType, IdentityLinker::CACHE_TYPE_ENDPOINT);
        $this->assertFalse($cacheExists);

        $endpointIdExists = $linker->endpointIdExists(Model::CATEGORY, $endpointId);
        $this->assertFalse($endpointIdExists);
    }

    /**
     *
     */
    public function testLinkModel()
    {
        $productHostId     = $this->createHostId();
        $productEndpointId = $this->createEndpointId();

        $shippingClassHostId     = $this->createHostId();
        $shippingClassEndpointId = $this->createEndpointId();

        $primaryKeyMapper = $this->createPrimaryKeyMapperMock(
            [$productHostId, $shippingClassHostId],
            [$productEndpointId, $shippingClassEndpointId]
        );
        $linker           = $this->createLinker($primaryKeyMapper);

        $product = new Product();
        $product->setId(new Identity($productEndpointId, $productHostId));

        $shippingClass = new ShippingClass();
        $shippingClass->setId(new Identity($shippingClassEndpointId, $shippingClassHostId));

        $linker->linkModel($product);

        $hostId = $linker->getHostId(Model::PRODUCT, 'id', $productEndpointId);
        $this->assertSame($productHostId, $hostId);

        $endpointId = $linker->getEndpointId(Model::PRODUCT, 'id', $productHostId);
        $this->assertSame($productEndpointId, $endpointId);

        $endpointIdExists = $linker->endpointIdExists(Model::PRODUCT, $productEndpointId);
        $this->assertTrue($endpointIdExists);

        $hostIdExists = $linker->hostIdExists(Model::PRODUCT, $productHostId);
        $this->assertTrue($hostIdExists);
    }

    /**
     *
     */
    public function testUnlinkModel()
    {
        $primaryKeyMapper = $this->createPrimaryKeyMapperMock([0]);
        $linker           = $this->createLinker($primaryKeyMapper);

        $expectedHostId = $this->createHostId();
        $endpointId     = $this->createEndpointId();

        $category = new Category();
        $category->setId(new Identity($endpointId, $expectedHostId));
        $linker->linkModel($category, true);

        $returnedHostId = $linker->getHostId(Model::CATEGORY, 'id', $endpointId);
        $this->assertSame(0, $returnedHostId);
    }

    /**
     *
     */
    public function testLinkCollection()
    {
        $expectedHostId = $this->createHostId();
        $endpointId     = $this->createEndpointId();

        $primaryKeyMapper = $this->createPrimaryKeyMapperMock([$expectedHostId], [$endpointId]);

        $linker = $this->createLinker($primaryKeyMapper);

        $product          = new Product();
        $productVariation = new ProductWarehouseInfo();
        $productVariation->setWarehouseId(new Identity($endpointId, $expectedHostId));
        $product->addWarehouseInfo($productVariation);

        $linker->linkModel($product);

        $returnedHostId = $linker->getHostId(Model::PRODUCT_WAREHOUSE_INFO, 'warehouseId', $endpointId);
        $this->assertSame($expectedHostId, $returnedHostId);
    }

    /**
     *
     */
    public function testUnlinkCollection()
    {
        $expectedHostId = $this->createHostId();
        $endpointId     = $this->createEndpointId();

        $primaryKeyMapper = $this->createPrimaryKeyMapperMock([$expectedHostId, null], [$endpointId, null]);
        $linker           = $this->createLinker($primaryKeyMapper);

        $product          = new Product();
        $productVariation = new ProductVariation();
        $productVariation->setId(new Identity($endpointId, $expectedHostId));
        $product->addVariation($productVariation);

        $linker->linkModel($product);

        $isHostIdExists = $linker->hostIdExists(Model::PRODUCT_VARIATION, $expectedHostId);
        $this->assertTrue($isHostIdExists);

        $linker->linkModel($product, true);

        $isHostIdExists = $linker->hostIdExists(Model::PRODUCT_VARIATION, $expectedHostId);
        $this->assertFalse($isHostIdExists);
    }

    /**
     *
     */
    public function testLinkIdentityList()
    {
        $expectedHostId     = $this->createHostId();
        $expectedEndpointId = $this->createEndpointId();
        $modelName          = Model::CONFIG_GROUP;

        $primaryKeyMapper = $this->createPrimaryKeyMapperMock([$expectedHostId, 0]);
        $linker           = $this->createLinker($primaryKeyMapper);

        $identity = new Identity($expectedEndpointId);

        $linker->linkIdentity($identity, $modelName, 'id');

        $this->assertEquals($expectedHostId, $identity->getHost());
        $hostId = $linker->getHostId($modelName, 'id', $expectedEndpointId);
        $this->assertEquals($hostId, $expectedHostId);

        $linker->linkIdentity($identity, $modelName, 'id', true);
        $hostId = $linker->getHostId($modelName, 'id', $expectedEndpointId);
        $this->assertNotEquals($expectedHostId, $hostId);

        $endpointId = $linker->getEndpointId($modelName, 'id', $expectedHostId);
        $this->assertNotEquals($expectedEndpointId, $endpointId);
    }

    /**
     *
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        \Mockery::close();
    }
}
