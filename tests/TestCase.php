<?php

namespace HansenMakangiras\FilamentSleekTheme\Tests;

use HansenMakangiras\FilamentSleekTheme\FilamentSleekThemeServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            FilamentSleekThemeServiceProvider::class,
        ];
    }
}
