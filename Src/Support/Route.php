<?php

namespace Wordpress\Support;

class Route
{
    public static function get(String $controllerMethod)
    {
        if (RequestType::get() === 'GET' && RequestType::getNotEmpty()) {
            return RouteHandler::call($controllerMethod);
        }
    }

    public static function post(String $controllerMethod)
    {
        if (RequestType::get() === 'POST' & empty($_POST['_method'])) {
            return RouteHandler::call($controllerMethod);
        }
    }

    public static function delete(String $controllerMethod)
    {
        if (isset($_GET['_method'])) {
            if ($_GET['_method'] === 'DELETE') {
                return RouteHandler::call($controllerMethod);
            }
        }
    }

    public static function update(String $controllerMethod)
    {
        if (isset($_POST['_method'])) {
            if ($_POST['_method'] === 'PUT') {
                return RouteHandler::call($controllerMethod);
            }
        }
    }

    public static function group(array $middlewares, array $controllersMethods)
    {
        foreach ($controllersMethods as $controllerMethod) {
            array_map(fn ($middleware) => MiddlewareHandler::call($middleware), $middlewares);
            return RouteHandler::call($controllerMethod);
        }
    }
}
