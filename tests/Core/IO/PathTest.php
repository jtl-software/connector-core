<?php
namespace Jtl\Connector\Test\Core\IO;

use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class PathTest
 * @package Jtl\Connector\Test\Core\IO
 */
class PathTest extends TestCase
{
    /**
     *
     */
    public function testEmptyPaths()
    {
        $this->expectExceptionObject(new \InvalidArgumentException('empty or invalid paths'));

        Path::combine();
    }

    /**
     * @dataProvider combineDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testCombine($input, $expected)
    {
        $combined = Path::combine(...$input);
        $this->assertSame($expected, $combined);
    }

    /**
     * @return array
     */
    public function combineDataProvider(): array
    {
        return [
            [['foo', 'bar'], 'foo/bar'],
            [['', 'bar'], '/bar'],
            [['/root/of', 'foo'], '/root/of/foo'],
            [['//home//path'], '/home//path'],
            [['/home/ path'], '/home/ path'],
            [['  ', '   '], '/'],
            [[false, false], '/'],
            [[false, '/'], '/'],
            [['\\\foo', 'bar'], 'foo/bar'],
            [['\\\foo', '\\\bar'], 'foo/bar'],
            [['1', 2, 'foo'], '1/2/foo'],
            [[1, 2, 3, 4], '1/2/3/4'],
            [[$part1 = uniqid(), $part2 = uniqid()], sprintf("%s/%s", $part1, $part2)],
        ];
    }
}
