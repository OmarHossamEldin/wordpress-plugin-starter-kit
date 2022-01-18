<?php

namespace Tests\Uint;

use PHPUnit\Framework\TestCase;
use Wordpress\Services\InstallService;

class ActivatePluginTest extends TestCase
{
    /** @test */
    public function install_service()
    {
        InstallService::install();
    }
}