<?php

namespace Wordpress\Support\Bootstrap;

use Wordpress\Support\Facades\Server\Session;
use Wordpress\Services\RoutingService;
use Wordpress\Services\AdminService;

class Plugin
{
    private Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function install()
    {
        register_activation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'install']);
       
        AdminService::initialize();
    }

    public function uninstall()
    {
        register_uninstall_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'uninstall']);
        $this->session->end();
    }

    public function deactivate()
    {
        register_deactivation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'deactivate']);
    }

    public function run()
    {
        $this->session->start();
        $this->session->add_items(['test' => 'from run']);
        RoutingService::initialize();
    }
}
