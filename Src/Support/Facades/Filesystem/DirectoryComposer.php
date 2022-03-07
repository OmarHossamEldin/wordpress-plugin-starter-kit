<?php

namespace Wordpress\Support\Facades\Filesystem;

use Wordpress\Support\Debug\Debugger;

class DirectoryComposer
{
    const PLUGIN_NAME_DIR =  'wordpress-starter-kit';

    public string $pluginRoot;
    public string $themes;
    public string $resources;
    public string $assets;
    public string $storageRoot;
    public string $logsRoot;
    public array $uploadPath;

    public function __construct()
    {
        $this->pluginRoot = WP_PLUGIN_DIR . '/' . self::PLUGIN_NAME_DIR;
        $this->themes = WP_CONTENT_DIR . '/themes/';
        $this->resources = $this->pluginRoot . "/Src/Resources";
        $this->assets = $this->pluginRoot;
        $this->storageRoot = WP_PLUGIN_DIR . '/' . self::PLUGIN_NAME_DIR . '/Src/Storage';
        $this->logsRoot =  "$this->storageRoot/Logs";
        $this->uploadPath = wp_upload_dir();
    }
}
