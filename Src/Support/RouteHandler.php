<?php

namespace Wordpress\Support;

class RouteHandler
{
    const CONTROLLERS_NAMESPACE = 'Wordpress\Controllers';

    public static function call($handler, Object $smarty, object $plugin)
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            $class = self::CONTROLLERS_NAMESPACE . '\\' . $class;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], [$smarty, $plugin]);
                }
            }
        }
        if (is_string($handler)) {
            [$class, $method] = explode('@', $handler);
            $class = self::CONTROLLERS_NAMESPACE . '\\' . $class;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], [$smarty, $plugin]);
                }
            }
        }
        if (is_callable($handler)) {
            return call_user_func_array($handler, [$smarty, $plugin]);
        }
    }
}
