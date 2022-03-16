<?php

namespace Wordpress\PluginName\Support\Facades\Template;

use Wordpress\PluginName\Support\Facades\Filesystem\DirectoryComposer;

class Asset
{
    /**
     * load css files
     *
     * @param array $files
     * @return void
     */
    public static function load_css(array $files)
    {
        $directoryComposer = new DirectoryComposer();
        $cssPath = $directoryComposer->assets . "/css/";
        foreach ($files  as $key => $file) {
            wp_register_style($key, $cssPath . $file . '.css');
            wp_enqueue_style($key);
        }
    }
    /**
     * load js files
     *
     * @param array $files
     * @return void
     */
    public static function load_js(array $files)
    {
        $directoryComposer = new DirectoryComposer();
        $jsPath = $directoryComposer->assets . "/js/";
        foreach ($files  as $key => $file) {
            wp_enqueue_script($key, $jsPath . $file . '.js');
        }
    }
    /**
     * register assets of the plugin
     *
     * @return void
     */
    public static function register_assets()
    {
        self::load_css([
            'bootstrap' => 'bootstrap.min',
            'bootstrap-rtl' => 'bootstrap.rtl.min',
            'bootstrap-utilities' => 'bootstrap-utilities.min',
            'bootstrap-utilities-rtl' => 'bootstrap-utilities.rtl',
            'style' => 'style'
        ]);

        self::load_js([
            'popper' => 'popper.min',
            'bootstrap.min' => 'bootstrap.min',
            'jquery' => 'jquery.min',
            'HttpRequest' => 'HttpRequest',
            'script' => 'script'
        ]);
    }
}
