<?php

namespace Wordpress\PluginName\Support\Facades\Router;

class RouteHandler
{
    private const CONTROLLERS_NAMESPACE = 'Wordpress\\PluginName\\Controllers\\';

    public static function call($handler, ?array $variableParams = null)
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            $class = self::CONTROLLERS_NAMESPACE  . $class;
            if (class_exists($class)) {
                $class = new $class();
                $paramsHandler = new ParamsHandler($class);
                if (method_exists($class, $method)) {
                    $params = $paramsHandler->get_method_params($method);
                    if (!!$variableParams) {
                        foreach ($variableParams as $param) {
                            $params[] = $param;
                        }
                    }
                    return call_user_func_array([$class, $method], $params);
                }
            }
        }
        if (is_string($handler)) {
            [$class, $method] = explode('@', $handler);
            $class = self::CONTROLLERS_NAMESPACE . $class;
            if (class_exists($class)) {
                $class = new $class();
                $paramsHandler = new ParamsHandler($class);
                if (method_exists($class, $method)) {
                    $params = $paramsHandler->get_method_params($method);
                    if (!!$variableParams) {
                        foreach ($variableParams as $param) {
                            $params[] = $param;
                        }
                    }
                    return call_user_func_array([$class, $method], $params);
                }
            }
        }
        if (is_callable($handler)) {
            return call_user_func($handler);
        }
    }
}
