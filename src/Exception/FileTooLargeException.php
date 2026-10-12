<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

class FileTooLargeException extends CompressionException
{
    protected string $entryName;
    protected int $size;
    protected int $maxSize;

    /**
     * @param string $entryName Name of the archive entry
     * @param int    $size      Uncompressed size in bytes
     * @param int    $maxSize   Maximum allowed size in bytes
     */
    public function __construct(string $entryName, int $size, int $maxSize)
    {
        $this->entryName = $entryName;
        $this->size      = $size;
        $this->maxSize   = $maxSize;
        parent::__construct(\sprintf('File "%s" is too large (%s)', $entryName, $this->getSizeInfo()));
    }

    /**
     * @return string
     */
    public function getEntryName(): string
    {
        return $this->entryName;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getMaxSize(): int
    {
        return $this->maxSize;
    }

    /**
     * Human-readable size and limit, e.g. "25.3 MB, max. 20 MB". The size is rounded up so it never
     * reads as equal to the limit.
     *
     * @return string
     */
    public function getSizeInfo(): string
    {
        return \sprintf('%s MB, max. %s MB', self::toMegabytes($this->size), self::toMegabytes($this->maxSize));
    }

    /**
     * @param int $bytes
     *
     * @return string
     */
    protected static function toMegabytes(int $bytes): string
    {
        return (string)(\ceil($bytes / 100_000) / 10);
    }
}
