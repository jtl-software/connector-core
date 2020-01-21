<?php
namespace Jtl\Connector\Test\Core\IO;

use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class TempTest
 * @package Jtl\Connector\Test\Core\IO
 */
class TempTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetDirectory()
    {
        $dir = Temp::getDirectory();
        $this->assertContains($dir, [CONNECTOR_DIR, sys_get_temp_dir()]);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectory()
    {
        $dir = Temp::createDirectory();

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectoryWithDifferentName()
    {
        $dir = Temp::createDirectory([Temp::getDirectory(), 'foo-bar-' . uniqid()]);

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }
}
