<?php

namespace Wordpress\PluginName\Support\Facades\Exception;

use Wordpress\PluginName\Support\Debug\Debugger;

class ExceptionHandler extends \Exception
{
    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'trace' => $this->getTraceAsString()
        ]);
    }
}