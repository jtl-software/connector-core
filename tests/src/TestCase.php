<?php

namespace Jtl\Connector\Core\Test;

use Faker\Factory;
use Faker\Generator;
use Jtl\Connector\Core\Config\ArrayConfig;
use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Model\Identity;
use Noodlehaus\AbstractConfig;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

/**
 * Class TestCase
 * @package Jtl\Connector\Core\Tests
 */
class TestCase extends \Jtl\UnitTest\TestCase
{
    protected $connectorDir = TEST_DIR;

    /**
     * @var string
     */
    protected $configFile;

    /**
     * @var Generator
     */
    private $faker;

    /**
     * @var vfsStreamDirectory
     */
    private $rootDir;

    /**
     *
     */
    protected function setUp(): void
    {
        $_POST = [];
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $files = [
            $this->configFile,
        ];

        foreach ($files as $file) {
            if (!\is_null($file) && \is_file($file)) {
                \unlink($file);
            }
        }

        $dirs = [
            \sprintf('%s/plugins', $this->connectorDir),
            \sprintf('%s/db', $this->connectorDir),
            \sprintf('%s/var', $this->connectorDir),
        ];

        foreach ($dirs as $dir) {
            if (\is_dir($dir)) {
                $this->removeDirRecursive($dir);
            }
        }
    }

    /**
     * @param string $dirname
     */
    protected function removeDirRecursive(string $dirname)
    {
        $elements = \glob($dirname . '/*');
        foreach ($elements as $element) {
            \is_dir($element) ? $this->removeDirRecursive($element) : \unlink($element);
        }
        \rmdir($dirname);
        return;
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected function createHostId(): int
    {
        return \random_int(1, 9999);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function createEndpointId(): string
    {
        return \sprintf("%s_%s", 't', $this->createHostId());
    }

    /**
     * @return Identity
     * @throws \Exception
     */
    protected function createIdentity(): Identity
    {
        return new Identity($this->createEndpointId(), $this->createHostId());
    }

    /**
     * @param string $className
     * @return array
     * @throws \ReflectionException
     */
    protected function getCorrectConstantsTestCases(string $className): array
    {
        $reflection = new \ReflectionClass($className);
        $constants  = \array_values($reflection->getConstants());

        $testCases = [];
        foreach ($constants as $constant) {
            $testCases[] = [
                $constant,
                true,
            ];
        }

        return $testCases;
    }

    /**
     * @param array $data
     * @return ArrayConfig
     */
    protected function createConfig(array $data = [])
    {
        return new ArrayConfig($data);
    }

    /**
     * @param string $payload
     * @param string $extension
     * @return FileConfig
     */
    protected function createFileConfig(string $payload = "{}", string $extension = 'json'): FileConfig
    {
        return new FileConfig($this->createConfigFile($payload, $extension));
    }

    /**
     * @param string $payload
     * @param string $extension
     * @return string
     */
    protected function createConfigFile(string $payload = '{}', string $extension = 'json'): string
    {
        $this->configFile = \sprintf('%s/%s.%s', \sys_get_temp_dir(), \uniqid('connector-config', true), $extension);
        \file_put_contents($this->configFile, $payload);
        return $this->configFile;
    }

    /**
     * @return vfsStreamDirectory
     */
    protected function getRootDir(): vfsStreamDirectory
    {
        if (\is_null($this->rootDir)) {
            $this->rootDir = vfsStream::setup();
        }
        return $this->rootDir;
    }

    /**
     * @param int $quantity
     * @return string[]
     */
    protected function createFiles($quantity = 2): array
    {
        $files = [];

        for ($i = 0; $i < $quantity; $i++) {
            $file = vfsStream::newFile(\time() . $i . '-file');

            $this->getRootDir()->addChild($file);

            $files[] = vfsStream::url($file->path());
        }

        return $files;
    }

    /**
     * @return mixed
     */
    protected function createFile(): string
    {
        return $this->createFiles(1)[0];
    }

    /**
     * @return Generator
     */
    protected function getFaker(): Generator
    {
        if (\is_null($this->faker)) {
            $this->faker = Factory::create();
        }
        return $this->faker;
    }
}
