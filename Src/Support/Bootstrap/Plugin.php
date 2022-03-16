<?php

namespace Wordpress\Support\Bootstrap;

use Wordpress\Support\Facades\Filesystem\DirectoryComposer;
use Wordpress\Services\InitializationService;
use Wordpress\Support\Facades\Server\Session;
use Wordpress\Services\RoutingService;
use Wordpress\Services\AdminService;

class Plugin
{
    private Session $session;
    private string $pluginRootFile; 

    public function __construct()
    {
        $this->session = new Session();
        $directoryComposer = new DirectoryComposer();
        $this->pluginRootFile = "$directoryComposer->pluginRoot/index.php";
    }

    public function install()
    {
        register_activation_hook($this->pluginRootFile, [InitializationService::class, 'install']);
       
        AdminService::initialize();
    }

    public function uninstall()
    {
        register_uninstall_hook($this->pluginRootFile, [InitializationService::class, 'uninstall']);
        $this->session->end();
    }

    public function deactivate()
    {
        register_deactivation_hook($this->pluginRootFile, [InitializationService::class, 'deactivate']);
    }

    public function run()
    {
        $this->session->start();
        RoutingService::initialize();
    }
}
