<?php
namespace Jtl\Connector\Core\Tests\Factory;

use Faker\Factory;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Tests\Factory\Faker\VatProvider;

/**
 * Class ModelFactory
 * @package Jtl\Connector\Core\Tests\Factory
 */
abstract class ModelFactory
{
    /**
     * @var Factory
     */
    protected static $faker;

    /**
     * @var array
     */
    protected static $identities = [];

    /**
     * @return Factory|\Faker\Generator
     */
    public static function getFaker()
    {
        $faker = self::$faker;
        if (is_null($faker)) {
            $faker = Factory::create('de_DE');

            $faker->addProvider(new VatProvider($faker));

            self::$faker = $faker;
        }
        return $faker;
    }

    /**
     * @param int $quantity
     * @param array $override
     * @return array
     * @throws \Exception
     */
    public function make(int $quantity, array $override = []): array
    {
        $models = [];

        $serializer = SerializerBuilder::getInstance()->build();

        for ($i = 0; $i < $quantity; $i++) {
            $model = $serializer->fromArray($this->makeOneArray($override), $this->getModelClass());
            $models[] = $model;
        }

        return $models;
    }

    /**
     * @param int $quantity
     * @param array $override
     * @return array
     */
    public function makeArray(int $quantity, array $override = []): array
    {
        $models = [];
        for ($i = 0; $i < $quantity; $i++) {
            $models[] = $this->makeOneArray($override);
        }
        return $models;
    }

    /**
     * @param array $override
     * @return array
     * @throws \Exception
     */
    public function makeOne(array $override = [])
    {
        return $this->make(1, $override)[0];
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function identity()
    {
        $endpointId = sprintf("%s_%s", 't', random_int(1, PHP_INT_MAX));
        $hostId = random_int(1, PHP_INT_MAX);

        $hash = md5($endpointId . $hostId);
        if (in_array($hash, self::$identities)) {
            return self::identity();
        }
        self::$identities[] = $hash;

        return [$endpointId, $hostId];
    }

    /**
     * @param string $from
     * @param string $to
     * @return string
     */
    protected function dateBetween(string $from, string $to = 'now'): string
    {
        return self::getFaker()->dateTimeBetween($from, $to)->format(\DateTime::ATOM);
    }

    /**
     * @param array $override
     * @return array
     */
    abstract protected function makeOneArray(array $override = []): array;

    /**
     * @return string
     */
    abstract protected function getModelClass(): string;
}
