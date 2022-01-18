<?php

namespace Wordpress\Support;

use Wordpress\Exceptions\ClassNotFoundException;
use Wordpress\Exceptions\MethodNotFoundException;
use Wordpress\Exceptions\UndefinedActionException;

class RouteHandler
{
    private const CONTROLLERS_NAMESPACE = 'Wordpress\Controllers';

    public static function call($handler)
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            $class = self::CONTROLLERS_NAMESPACE . '\\' . $class;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
                throw new MethodNotFoundException();
            }
            throw new ClassNotFoundException();
        }
        if (is_string($handler)) {
            [$class, $method] = explode('@', $handler);
            $class = self::CONTROLLERS_NAMESPACE . '\\' . $class;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
                throw new MethodNotFoundException();
            }
            throw new ClassNotFoundException();
        }
        if (is_callable($handler)) {
            return call_user_func_array($handler, []);
        }
        throw new UndefinedActionException();
    }
}
