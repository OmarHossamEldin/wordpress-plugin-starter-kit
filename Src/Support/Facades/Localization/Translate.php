<?php

namespace Wordpress\PluginName\Support\Facades\Localization;

use Wordpress\PluginName\Support\Facades\Filesystem\DirectoryComposer;

class Translate
{
    public static function translate($fileName, $key): string
    {
        $lang = Lang::get();
        $directoryComposer = new DirectoryComposer();
        $fileName = require("{$directoryComposer->pluginRoot}/Src/Langs/{$lang}/{$fileName}.php");
        return $fileName[$key];
    }

    public static function getTranslations($fileName): array
    {
        $lang = Lang::get();
        $directoryComposer = new DirectoryComposer();
        $fileName = require("{$directoryComposer->pluginRoot}/Src/Langs/{$lang}/{$fileName}.php");
        return $fileName;
    }
}
