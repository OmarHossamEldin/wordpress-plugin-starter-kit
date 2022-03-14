<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wordpress\Support\Facades\Router\Route;

class RoutePluginTest extends TestCase
{
    /** @test */
    public function route_component_success()
    {
        $output = Route::execute('TestController@test');
        $this->assertEquals($output, 'test');
    }
}
