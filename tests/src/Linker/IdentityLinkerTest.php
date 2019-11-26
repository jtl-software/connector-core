<?php
namespace Jtl\Connector\Test\Linker;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductVariation;
use Jtl\Connector\Test\DatabaseTestCase;
use Jtl\Connector\Test\Stub\PrimaryKeyMapper;

/**
 * Class IdentityLinkerTest
 * @package Jtl\Connector\Core\Linker
 */
class IdentityLinkerTest extends DatabaseTestCase
{
    /**
     * @param bool $clearMapper
     * @return IdentityLinker
     */
    protected function createLinker($clearMapper = true)
    {
        /** @var $primaryKeyMapper PrimaryKeyMapperInterface */
        $primaryKeyMapper = $this->createPrimaryKeyMapper();

        if ($clearMapper) {
            $primaryKeyMapper->clear();
        }

        return new IdentityLinker($primaryKeyMapper);
    }

    /**
     * @return PrimaryKeyMapperInterface
     */
    protected function createPrimaryKeyMapper(): PrimaryKeyMapperInterface
    {
        return new PrimaryKeyMapper($this->getConnection());
    }

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
     * @return array
     * @throws \Exception
     */
    public function hostIdDataProvider()
    {
        return [
            [0, false],
            [null, false],
            [$this->createHostId(), true]
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
            [0, true],
            [null, false],
            [$this->createEndpointId(), true]
        ];
    }

    /**
     * @throws \ReflectionException
     */
    public function testCache()
    {
        $linker = $this->createLinker();
        $linker->setUseCache(true);

        $reflection = new \ReflectionClass($linker);

        $deleteCache = $reflection->getMethod('deleteCache');
        $deleteCache->setAccessible(true);

        $saveCache = $reflection->getMethod('saveCache');
        $saveCache->setAccessible(true);

        $checkCache = $reflection->getMethod('checkCache');
        $checkCache->setAccessible(true);

        $loadCache = $reflection->getMethod('loadCache');
        $loadCache->setAccessible(true);

        $cacheType = IdentityLinker::CACHE_TYPE_ENDPOINT;
        $type = IdentityType::CATEGORY;
        $endpointId = $this->createEndpointId();
        $hostId = $this->createHostId();

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

        $saveCache->invoke($linker, null, $hostId, $type, IdentityLinker::CACHE_TYPE_HOST);
        $this->assertCount(1, $linker->getCache());

        $saveCache->invoke($linker, $endpointId, null, $type, IdentityLinker::CACHE_TYPE_ENDPOINT);
        $this->assertCount(2, $linker->getCache());
    }

    /**
     *
     */
    public function testHostIdResolver()
    {
        $linker = $this->createLinker(false);

        $hostId = $linker->getHostId(Model::CATEGORY, 'id', '1');

        $this->assertSame(1, $hostId);

        $modelName = Model::CATEGORY;
        $property = 'property_doesnt_exists';
        $this->expectExceptionObject(DefinitionException::unknownIdentityProperty($modelName, $property));

        $linker->getHostId($modelName, $property, '30');
    }

    /**
     *
     */
    public function testEndpointIdResolver()
    {
        $linker = $this->createLinker(false);

        $endpointId = $linker->getEndpointId(Model::CATEGORY, 'id', 1);

        $this->assertSame("1", $endpointId);

        $modelName = Model::CATEGORY;
        $property = 'property_doesnt_exists';
        $this->expectExceptionObject(DefinitionException::unknownIdentityProperty($modelName, $property));

        $linker->getEndpointId($modelName, $property, '30');
    }

    /**
     *
     */
    public function testIdentityClear()
    {
        $linker = $this->createLinker(false);

        $this->assertDatabaseHas('mapping', [
            'endpoint' => '1',
            'host' => 1,
            'type' => Model::getIdentityType(Model::CATEGORY)
        ]);

        $linker->clear();

        $this->assertTableIsEmpty('mapping');
    }

    /**
     *
     */
    public function testIdentitySave()
    {
        $linker = $this->createLinker();

        $endpointId = $this->createEndpointId();
        $hostId = $this->createHostId();
        $modelName = Model::CATEGORY;
        $property = 'parentCategoryId';
        $identityType = Model::getIdentityType($modelName);

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
        $linker = $this->createLinker();
        $endpointId = $this->createEndpointId();
        $hostId = $this->createHostId();
        $modelName = Model::CATEGORY;
        $property = 'id';
        $identityType = Model::getIdentityType($modelName);

        $reflection = new \ReflectionClass($linker);
        $checkCache = $reflection->getMethod('checkCache');
        $checkCache->setAccessible(true);

        $linker->save($endpointId, $hostId, $modelName, $property);

        $deleteResult = $linker->delete($modelName, $endpointId, $hostId);
        $this->assertTrue($deleteResult);

        $cacheExists = $checkCache->invoke($linker, $endpointId, $identityType, IdentityLinker::CACHE_TYPE_ENDPOINT);
        $this->assertFalse($cacheExists);

        $returnedEndpointId = $linker->endpointIdExists(Model::CATEGORY, $property, $hostId);
        $this->assertFalse($returnedEndpointId);
    }

    /**
     *
     */
    public function testLinkModel()
    {
        $linker = $this->createLinker();

        $expectedHostId = $this->createHostId();
        $endpointId = $this->createEndpointId();

        $product = new Product();
        $product->setId(new Identity($endpointId, $expectedHostId));

        $linker->linkModel($product);

        $this->assertDatabaseHas('mapping', [
            'endpoint' => $endpointId,
            'host' => $expectedHostId,
            'type' => Model::getIdentityType(Model::PRODUCT)
        ]);

        $returnedHostId = $linker->getHostId(Model::PRODUCT, 'id', $endpointId);
        $this->assertSame($expectedHostId, $returnedHostId);

        $isEndpointIdExists = $linker->endpointIdExists(Model::PRODUCT, $endpointId);
        $this->assertTrue($isEndpointIdExists);

        $hostIdExists = $linker->hostIdExists(Model::PRODUCT, $expectedHostId);
        $this->assertTrue($hostIdExists);
    }

    /**
     *
     */
    public function testUnlinkModel()
    {
        $linker = $this->createLinker();

        $expectedHostId = $this->createHostId();
        $endpointId = $this->createEndpointId();

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
        $linker = $this->createLinker();

        $expectedHostId = $this->createHostId();
        $endpointId = $this->createEndpointId();

        $product = new Product();
        $productVariation = new ProductVariation();
        $productVariation->setId(new Identity($endpointId, $expectedHostId));
        $product->addVariation($productVariation);

        $linker->linkModel($product);

        $returnedHostId = $linker->getHostId(Model::PRODUCT_VARIATION, 'id', $endpointId);
        $this->assertSame($expectedHostId, $returnedHostId);

        $linker->clear();

        $endpointId = $this->createEndpointId();

        $product = new Product();
        $productVariation = new ProductVariation();
        $productVariation->setId(new Identity($endpointId));
        $product->addVariation($productVariation);

        $linker->linkModel($product);

        $returnedEndpointId = $linker->getEndpointId(Model::PRODUCT_VARIATION, 'id', $expectedHostId);
        $this->assertSame($endpointId, $returnedEndpointId);
    }

    /**
     *
     */
    public function testUnlinkCollection()
    {
        $linker = $this->createLinker();

        $expectedHostId = $this->createHostId();
        $endpointId = $this->createEndpointId();

        $product = new Product();
        $productVariation = new ProductVariation();
        $productVariation->setId(new Identity($endpointId, $expectedHostId));
        $product->addVariation($productVariation);

        $linker->linkModel($product);

        $isHostIdExists = $linker->hostIdExists(Model::PRODUCT_VARIATION, $expectedHostId);
        $this->assertTrue($isHostIdExists);

        $linker->linkModel($product, true);

        $isHostIdExists = $linker->hostIdExists(Model::PRODUCT_VARIATION, $expectedHostId, true);
        $this->assertFalse($isHostIdExists);
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
