<?php

namespace Jtl\Connector\Core\Test\Logger;

use Jtl\Connector\Core\Exception\LoggerException;
use Jtl\Connector\Core\Logger\LoggerService;
use Jtl\Connector\Core\Test\TestCase;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Psr\Log\LogLevel;

class LoggerServiceTest extends TestCase
{
    /**
     * @var LoggerService
     */
    protected $factory;

    protected $logDir;

    public function testSetFormat()
    {
        $args = [JsonFormatter::BATCH_MODE_NEWLINES];
        $this->factory->setFormat('json', $args);
        $reflection    = new \ReflectionClass($this->factory);
        $formatterProp = $reflection->getProperty('formatter');
        $formatterProp->setAccessible(true);
        $formatter = $formatterProp->getValue($this->factory);
        $this->assertInstanceOf(JsonFormatter::class, $formatter);
    }

    public function testSetFormatFormatterNotFound()
    {
        $this->expectException(LoggerException::class);
        $this->expectExceptionCode(LoggerException::FORMATTER_NOT_EXISTS);
        $this->factory->setFormat('yolo');
    }

    public function testSetFormatter()
    {
        $formatterMock = $this->createMock(FormatterInterface::class);
        $this->factory->setFormatter($formatterMock);
        $reflection    = new \ReflectionClass($this->factory);
        $formatterProp = $reflection->getProperty('formatter');
        $formatterProp->setAccessible(true);
        $actualFormatter = $formatterProp->getValue($this->factory);
        $this->assertEquals($formatterMock, $actualFormatter);
    }

    public function testSetFormatterToExistingLoggers()
    {
        $formatterMock = $this->createMock(FormatterInterface::class);
        foreach (['foo', 'bar', 'foobar'] as $channel) {
            $fooLogger = $this->factory->get($channel);
            $handlers  = $fooLogger->getHandlers();
            $this->assertNotEquals($formatterMock, $handlers[0]->getFormatter());
        }
        $this->factory->setFormatter($formatterMock);
        foreach (['foo', 'bar', 'foobar'] as $channel) {
            $fooLogger = $this->factory->get($channel);
            $handlers  = $fooLogger->getHandlers();
            $this->assertEquals($formatterMock, $handlers[0]->getFormatter());
        }
    }

    public function testGet()
    {
        $reflection   = new \ReflectionClass($this->factory);
        $channelsProp = $reflection->getProperty('channels');
        $channelsProp->setAccessible(true);
        $channels = $channelsProp->getValue($this->factory);
        $this->assertEmpty($channels);
        $fooChannel = $this->factory->get('foo');
        $channels   = $channelsProp->getValue($this->factory);
        $this->assertArrayHasKey('foo', $channels);
        $this->assertEquals($fooChannel, $channels['foo']);
        $handlers = $fooChannel->getHandlers();
        $this->assertArrayHasKey(0, $handlers);
        $this->assertInstanceOf(RotatingFileHandler::class, $handlers[0]);
        $this->assertEquals($fooChannel, $this->factory->get('foo'));

        $expectedLogFileName = \sprintf('%s/foo.log', $this->logDir);
        $handlerReflection   = new \ReflectionClass($handlers[0]);
        $filenameProp        = $handlerReflection->getProperty('filename');
        $filenameProp->setAccessible(true);
        $this->assertEquals($expectedLogFileName, $filenameProp->getValue($handlers[0]));
    }

    public function testHas()
    {
        $this->factory->get('foo');
        $this->assertTrue($this->factory->has('foo'));
    }

    public function testHasNot()
    {
        $this->assertFalse($this->factory->has('bar'));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->logDir  = \sprintf('%s/var/log', $this->connectorDir);
        $this->factory = new LoggerService($this->logDir, LogLevel::DEBUG);
    }
}
