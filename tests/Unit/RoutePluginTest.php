<?php

namespace Tests\Uint;

use PHPUnit\Framework\TestCase;
use Wordpress\Support\Route\Route;

class RoutePluginTest extends TestCase
{
    /** @test */
    public function route_componant_success()
    {
        Route::get('test', 'TestController@test');
        $output = Route::resolve('url/url?fetch=test', 'get');

        $this->assertEquals($output, 'test');
    }
}
