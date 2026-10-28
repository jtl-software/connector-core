<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Compression;

use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\FileNotFoundException;
use Jtl\Connector\Core\Exception\FileTooLargeException;

class Zip
{
    /** Maximum uncompressed size of a single archive entry in bytes (20 MB) */
    public const int MAX_ENTRY_SIZE = 20000000;

    /**
     * @param string $sourceFile
     * @param string $targetFolder
     *
     * @return bool
     * @throws CompressionException
     * @throws FileNotFoundException
     * @throws FileTooLargeException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function extract(string $sourceFile, string $targetFolder): bool
    {
        if (!\class_exists('ZipArchive')) {
            throw new CompressionException('Class ZipArchive not found. PHP 5 >= 5.2.0, PECL zip >= 1.1.0 installed?');
        }

        if (!\file_exists($sourceFile)) {
            throw new FileNotFoundException(\sprintf('File (%s) not found', $sourceFile));
        }

        if (!\is_dir($targetFolder) || !\is_writable($targetFolder)) {
            throw new \InvalidArgumentException(
                \sprintf('Folder (%s) does not exists or is not writeable', $targetFolder)
            );
        }

        $archive = new \ZipArchive();
        if ($archive->open($sourceFile) === true) {
            $index         = 0;
            $isBomb        = false;
            $tooLargeEntry = null;

            while (($stat = $archive->statIndex($index))) {
                $size     = $stat['size'];
                $compSize = $stat['comp_size'];

                if ($size > self::MAX_ENTRY_SIZE) {
                    $tooLargeEntry = $stat;
                    break;
                }

                // A comp_size of 0 with a non-zero uncompressed size is inconsistent (malformed entry)
                // and must be rejected, as ZipArchive may report success while writing a truncated file.
                // A genuinely empty entry (size and comp_size both 0, e.g. empty files or directories)
                // is allowed and must not trigger a division by zero.
                // Images won't reach a compression ratio above 100.
                if (($compSize === 0 && $size > 0) || ($compSize > 0 && $size / $compSize > 100)) {
                    $isBomb = true;
                    break;
                }

                if ($index > 100) {
                    $isBomb = true;
                    break;
                }

                $index++;
            }

            if (!\is_null($tooLargeEntry)) {
                throw new FileTooLargeException($tooLargeEntry['name'], $tooLargeEntry['size'], self::MAX_ENTRY_SIZE);
            }

            if ($isBomb) {
                throw new \RuntimeException('Zip bomb detected');
            }

            $archive->extractTo($targetFolder);
            $archive->close();

            return true;
        }

        return false;
    }
}
