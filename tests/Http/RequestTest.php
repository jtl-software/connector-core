<?php
namespace Jtl\Connector\Core\Test\Http;

use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\Http\Request;
use Jtl\Connector\Core\Test\TestCase;
use org\bovigo\vfs\vfsStream;

/**
 * Class RequestTest
 * @package Jtl\Connector\Core\Http
 */
class RequestTest extends TestCase
{
    /**
     * @var vfsStream
     */
    private $rootDir;

    /**
     *
     */
    public function setUp(): void
    {
        $this->rootDir = vfsStream::setup();
    }

    /**
     * @throws \Jtl\Connector\Core\Exception\HttpException
     */
    public function testGetPost()
    {
        $empty = Request::get();
        $this->assertNull($empty);

        $expectedArray = [1, 2, 3];

        $_POST['jtlrpc'] = $expectedArray;

        $actual = Request::get();
        $this->assertSame($expectedArray, $actual);
    }

    /**
     * @throws HttpException
     */
    public function testUnknownMethod()
    {
        $this->expectExceptionObject(HttpException::unknownMethod('foo'));

        Request::get('foo');
    }

    /**
     *
     */
    public function testGetMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'post';

        $method = Request::getMethod();

        $this->assertSame('POST', $method);
    }

    /**
     *
     */
    public function testExists()
    {
        $_POST['jtlrpc'] = false;

        $exists = Request::exists();

        $this->assertTrue($exists);
    }

    /**
     *
     */
    public function testNotExists()
    {
        $exists = Request::exists();

        $this->assertFalse($exists);
    }

    /**
     * @throws \Exception
     */
    public function testDeleteFileUpload()
    {
        $file = $this->createFile();

        $this->assertFileExists($file);

        $isDeleted = Request::deleteFileUpload($file);

        $this->assertTrue($isDeleted);
        $this->assertFileNotExists($file);
    }

    /**
     * @param int $quantity
     * @return array
     */
    protected function createFiles($quantity = 2)
    {
        $files = [];

        for ($i=0;$i<$quantity;$i++) {
            $file = vfsStream::newFile(time() . $i . '-file');

            $this->rootDir->addChild($file);

            $files[] = vfsStream::url($file->path());
        }

        return $files;
    }

    /**
     * @return mixed
     */
    protected function createFile()
    {
        return $this->createFiles(1)[0];
    }

    /**
     * @throws \Exception
     */
    public function testDeleteFileUploadsWithFolder()
    {
        $tmpDir = vfsStream::url($this->rootDir->path());

        $files = $this->createFiles(2);

        $this->assertDirectoryExists($tmpDir);
        foreach ($files as $file) {
            $this->assertFileExists($file);
        }

        Request::deleteFileUploads($files);

        $this->assertDirectoryNotExists($tmpDir);
        foreach ($files as $file) {
            $this->assertFileNotExists($file);
        }
    }

    /**
     *
     */
    public function testJtlRpcIsPresentOnHandleResult()
    {
        $expected = json_encode([
            'jtlrpc' => '2.0'
        ]);
        $_POST['jtlrpc'] = $expected;

        $result = Request::getJtlrpc();

        $this->assertSame($expected, $result);
    }

    /**
     *
     */
    public function testJtlRpcIsMissingOnHandleRequest()
    {
        $result = Request::getJtlrpc();
        $this->assertNull($result);
    }

    /**
     * @throws \Jtl\Connector\Core\Exception\HttpException
     */
    public function testJtlAuthIsPresentOnGetSession()
    {
        $expected = [
            'token' => 'foo_bar'
        ];
        $_REQUEST['jtlauth'] = $expected;

        $result = Request::getSession();
        $this->assertEquals($expected, $result);
    }

    /**
     * @throws \Jtl\Connector\Core\Exception\HttpException
     */
    public function testJtlAuthIsMissingOnGetSession()
    {
        $result = Request::getSession();
        $this->assertNull($result);
    }

    /**
     *
     */
    public function tearDown(): void
    {
        parent::tearDown();
        $_POST = [];
        $_GET = [];
        $_FILES = [];
        $_REQUEST = [];
        unset($_SERVER['REQUEST_METHOD']);
    }
}
