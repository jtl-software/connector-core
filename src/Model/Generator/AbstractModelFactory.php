<?php

namespace Jtl\Connector\Core\Model\Generator;

use Faker\Factory;
use Faker\Generator;
use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Serializer\SerializerBuilder;

/**
 * Class ModelFactory
 * @package Jtl\Connector\Core\Model\Generator
 */
abstract class AbstractModelFactory
{
    /**
     * @var string
     */
    protected $defaultLocale;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var array
     */
    protected static $identities = [];

    /**
     * @var AbstractModelFactory[]
     */
    protected static $factories = [];

    /**
     * @return array
     */
    abstract protected function makeFakeArray(): array;

    /**
     * @return string
     */
    abstract protected function getModelClass(): string;

    /**
     * AbstractModelFactory constructor.
     * @param string $defaultLocale
     * @param Generator|null $faker
     * @param Serializer|null $serializer
     */
    public function __construct(string $defaultLocale = 'de_DE', Generator $faker = null, Serializer $serializer = null)
    {
        $this->defaultLocale = $defaultLocale;

        if (is_null($faker)) {
            $faker = Factory::create($defaultLocale);
        }
        $this->faker = $faker;

        if (is_null($serializer)) {
            $serializer = SerializerBuilder::create()->build();
        }
        $this->serializer = $serializer;
    }

    /**
     * @param int $quantity
     * @param array $specificOverrides
     * @param array $globalOverrides
     * @return array
     */
    public function make(int $quantity, array $specificOverrides = [], array $globalOverrides = []): array
    {
        $models = [];

        for ($i = 0; $i < $quantity; $i++) {
            $model = $this->serializer->fromArray($this->makeOneArray(array_merge($globalOverrides, $specificOverrides[$i] ?? [])), $this->getModelClass());
            $models[] = $model;
        }

        return $models;
    }

    /**
     * @param int $quantity
     * @param array $specificOverrides
     * @param array $globalOverrides
     * @return array
     */
    public function makeArray(int $quantity, array $specificOverrides = [], array $globalOverrides = []): array
    {
        $models = [];
        for ($i = 0; $i < $quantity; $i++) {
            $models[] = $this->makeOneArray(array_merge($globalOverrides, $specificOverrides[$i] ?? []));
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
        return $this->make(1, [$override])[0];
    }

    /**
     * @param mixed[] $override
     * @return mixed[]
     */
    public function makeOneArray(array $override = []): array
    {
        return $override + $this->makeFakeArray();
    }

    /**
     * @param integer $identityType
     * @return mixed[]
     * @throws \Exception
     */
    public function makeIdentityArray(int $identityType)
    {
        do {
            list($endpoint, $host) = $this->getFactory('Identity')->makeOneArray();
            if (!isset(self::$identities[$identityType][$endpoint])) {
                break;
            }
        } while (true);

        self::setIdentity($identityType, $endpoint, $host);
        return self::getIdentity($identityType, $endpoint);
    }

    /**
     * @param integer $identityType
     * @return mixed
     * @throws \Exception
     */
    public function makeIdentity(int $identityType)
    {
        return $this->serializer->fromArray($this->makeIdentityArray($identityType), Identity::class);
    }

    /**
     * @return Generator
     */
    public function getFaker(): Generator
    {
        return $this->faker;
    }

    /**
     * @param integer $identityType
     * @param string $endpoint
     * @param integer $host
     */
    public static function setIdentity(int $identityType, string $endpoint, int $host): void
    {
        self::$identities[$identityType][$endpoint] = $host;
    }

    /**
     * @param integer $identityType
     * @param string $endpoint
     * @return boolean
     */
    public static function hasIdentity(int $identityType, string $endpoint): bool
    {
        return isset(self::$identities[$identityType][$endpoint]);
    }

    /**
     * @param integer $identityType
     * @param integer $host
     * @return boolean
     */
    public static function hasIdentityByHost(int $identityType, int $host): bool
    {
        return isset(self::$identities[$identityType]) && in_array($host, self::$identities[$identityType], true);
    }

    /**
     * @param int $identityType
     * @param int $host
     * @return array|null
     */
    public static function getIdentityByHost(int $identityType, int $host): ?array
    {
        if (self::hasIdentityByHost($identityType, $host)) {
            return self::getIdentity($identityType, array_search($host, self::$identities[$identityType], true));
        }
        return null;
    }

    /**
     * @param integer $identityType
     * @param string $endpoint
     * @return array|null
     */
    public static function getIdentity(int $identityType, string $endpoint): ?array
    {
        if (self::hasIdentity($identityType, $endpoint)) {
            return [$endpoint, self::$identities[$identityType][$endpoint]];
        }
        return null;
    }

    /**
     * @param string $from
     * @param string $to
     * @return string
     */
    protected function dateBetween(string $from, string $to = 'now'): string
    {
        return $this->faker->dateTimeBetween($from, $to)->format(\DateTime::ATOM);
    }

    /**
     * @param string $name
     * @return AbstractModelFactory
     */
    public function getFactory(string $name): self
    {
        return self::createFactory($name, $this->defaultLocale, $this->faker, $this->serializer);
    }

    /**
     * @param string $name
     * @param string $locale
     * @param Generator|null $faker
     * @param Serializer|null $serializer
     * @return AbstractModelFactory
     */
    public static function createFactory(string $name, string $locale = 'de_DE', Generator $faker = null, Serializer $serializer = null)
    {
        $className = sprintf('%s\\%sFactory', __NAMESPACE__, ucfirst($name));
        if (!class_exists($className)) {
            throw new \RuntimeException(sprintf('Class %s not found', $className));
        }

        $locale = str_replace('-', '_', $locale);
        $factoriesIndex = md5(sprintf('%s%s', $className, $locale));
        if (!isset(self::$factories[$factoriesIndex])) {
            self::$factories[$factoriesIndex] = new $className($locale, $faker, $serializer);
        }

        return self::$factories[$factoriesIndex];
    }
}
