<?php

namespace Wordpress\Support\Template;

class Asset
{
    private static $cssPath = PLUGIN_PATH . '/Src/Resources/css/';
    private static $jsPath = PLUGIN_PATH . '/Src/Resources/js/';

    /**
     * load css files
     *
     * @param array $files
     * @return void
     */
    public static function load_css(array $files)
    {
        foreach ($files  as $key => $file) {
            wp_register_style($key, self::$cssPath . $file . '.css');
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
        foreach ($files  as $key => $file) {
            wp_enqueue_script($key, self::$jsPath . $file . '.js');
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
            'mybootstrap' => 'bootstrap',
            'myjquery' => 'jquery-ui',
            'chosen' => 'chosen.min',
            'mystyle' => 'style'
        ]);

        self::load_js([
            'myjquery' => 'jquery.min',
            'jquery-ui' => 'jquery-ui.min',
            'chosen' => 'chosen.jquery.min',
            'request' => 'request',
            'script' => 'script'
        ]);
    }
}
