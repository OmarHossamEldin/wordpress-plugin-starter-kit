<?php

namespace Wordpress\PluginName\Support\Bootstrap;

use Wordpress\PluginName\Support\Facades\Filesystem\DirectoryComposer;
use Wordpress\PluginName\Services\InitializationService;
use Wordpress\PluginName\Support\Facades\Server\Session;
use Wordpress\PluginName\Services\RoutingService;
use Wordpress\PluginName\Services\AdminService;

class Plugin
{
    private Session $session;
    private DirectoryComposer $directoryComposer; 

    public function __construct()
    {
        $this->session = new Session();
        $this->directoryComposer = new DirectoryComposer();
    }

    public function install()
    {
        register_activation_hook($this->directoryComposer->pluginRootFile, [InitializationService::class, 'install']);
       
        AdminService::initialize();
    }

    public function uninstall()
    {
        register_uninstall_hook($this->directoryComposer->pluginRootFile, [InitializationService::class, 'uninstall']);
        $this->session->end();
    }

    public function deactivate()
    {
        register_deactivation_hook($this->directoryComposer->pluginRootFile, [InitializationService::class, 'deactivate']);
    }

    public function run()
    {
        $this->session->start();
        RoutingService::initialize();
    }
}
