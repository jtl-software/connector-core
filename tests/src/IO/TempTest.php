<?php
namespace Jtl\Connector\Core\Test\IO;

use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class TempTest
 * @package Jtl\Connector\Core\Test\IO
 */
class TempTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetDirectory()
    {
        $dir = (new Temp($this->connectorDir))->getDirectory();
        $this->assertContains($dir, [$this->connectorDir, sys_get_temp_dir()]);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectory()
    {
        $dir = (new Temp($this->connectorDir))->createDirectory();

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectoryWithDifferentName()
    {
        $temp = new Temp($this->connectorDir);
        $dir = $temp->createDirectory(...[$temp->getDirectory(), 'foo-bar-' . uniqid()]);

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }
}
