<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Compression;

use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Test\TestCase;

/**
 * @package Jtl\Connector\Core\Test\Compression
 */
class ZipTest extends TestCase
{
    private const string TOO_LARGE_ENTRY_NAME = '284_Product.jpg';

    private string $targetFolder;

    private ?string $archivePath = null;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->targetFolder = \sprintf('%s/%s', \sys_get_temp_dir(), \uniqid('zip-test-', true));
        \mkdir($this->targetFolder);
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->removeDirRecursive($this->targetFolder);

        if (!\is_null($this->archivePath) && \is_file($this->archivePath)) {
            \unlink($this->archivePath);
        }
    }

    /**
     * @return void
     */
    public function testExtractExtractsAllFilesOfAValidArchive(): void
    {
        $zip = new Zip();

        $result = $zip->extract(\TEST_DIR . '/fixtures/images_push.zip', $this->targetFolder);

        $this->assertTrue($result);
        $this->assertFileExists(\sprintf('%s/284_Product.jpg', $this->targetFolder));
    }

    /**
     * @return void
     */
    public function testExtractThrowsExceptionContainingTheEntryNameWhenAnImageExceedsTheSizeLimit(): void
    {
        $archivePath = $this->createArchiveWithOversizedEntry();

        $zip = new Zip();

        try {
            $zip->extract($archivePath, $this->targetFolder);
            $this->fail('Expected RuntimeException was not thrown.');
        } catch (\RuntimeException $exception) {
            $this->assertSame(
                \sprintf('Image "%s" too large', self::TOO_LARGE_ENTRY_NAME),
                $exception->getMessage()
            );
        }
    }

    /**
     * @return string
     */
    private function createArchiveWithOversizedEntry(): string
    {
        $archivePath = \sprintf('%s/%s.zip', \sys_get_temp_dir(), \uniqid('too-large-', true));

        $archive = new \ZipArchive();
        $archive->open($archivePath, \ZipArchive::CREATE);
        $archive->addFromString(self::TOO_LARGE_ENTRY_NAME, \str_repeat('a', 20_000_001));
        $archive->close();

        $this->archivePath = $archivePath;

        return $archivePath;
    }
}
