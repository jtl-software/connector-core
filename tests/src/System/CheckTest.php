<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\System;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Test\TestCase;

class CheckTest extends TestCase
{
    /**
     * Check::run() enforces Application::MIN_PHP_VERSION, which must match the PHP requirement in composer.json.
     *
     * @return void
     * @throws \JsonException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testMinPhpVersionMatchesComposerRequirement(): void
    {
        $composerJson = \file_get_contents(\dirname(\TEST_DIR) . '/composer.json');
        $this->assertIsString($composerJson);

        /** @var array{require: array{php: string}} $composer */
        $composer = \json_decode($composerJson, true, 512, \JSON_THROW_ON_ERROR);
        $this->assertSame($composer['require']['php'], '>=' . Application::MIN_PHP_VERSION);
    }
}
