<?php

namespace Resma\FilamentAwinTheme\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Resma\FilamentAwinTheme\FilamentAwinThemeServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            FilamentAwinThemeServiceProvider::class,
        ];
    }
}
