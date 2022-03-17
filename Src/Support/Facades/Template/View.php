<?php

namespace Wordpress\PluginName\Support\Facades\Template;

use Wordpress\PluginName\Support\Facades\Filesystem\DirectoryComposer;

class View
{
    public static function render(string $path, $data = []): void
    {
        $data['directoryComposer'] = new DirectoryComposer();
        if (count($data) !== 0) {
            extract($data);
        }
        ob_start();
        require_once $data['directoryComposer']->views . '/' . $path . '.php';
        echo (string) ob_get_clean();
    }
}
