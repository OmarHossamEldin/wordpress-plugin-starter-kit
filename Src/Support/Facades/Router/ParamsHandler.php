<?php

namespace Wordpress\PluginName\Support\Facades\Router;

class ParamsHandler
{
    private $reflection;

    public function __construct($class)
    {
        $this->reflection = new \ReflectionClass($class);
    }

    public function get_method_params($method): array
    {
        $methodParams = $this->reflection->getMethod($method)->getParameters();
        $initializedParams = [];
        foreach ($methodParams as $param) {
            $parameterClassName = $param->getType()->getName();
            if (class_exists($parameterClassName)) {
                $initializedParams[] = new $parameterClassName();
            } 
        }
        unset($methodParams, $param);
        return $initializedParams;
    }
}
