<?php

namespace Wordpress\Support;

class Route
{
    const CONTROLLERS_NAMESPACE = 'Wordpress\Controllers';

    public static function get(String $controllerMethod, Object $smarty = null, Object $plugin = null)
    {
        if (RequestType::get() === 'GET' && RequestType::getNotEmpty()) {
            return RouteHandler::call($controllerMethod, $smarty, $plugin);
        }
    }

    public static function post(String $controllerMethod, Object $smarty = null, Object $plugin = null)
    {
        if (RequestType::get() === 'POST' & empty($_POST['_method'])) {
            return RouteHandler::call($controllerMethod, $smarty, $plugin);
        }
    }

    public static function delete(String $controllerMethod, Object $smarty = null, Object $plugin = null)
    {
        if (isset($_GET['_method'])) {
            if ($_GET['_method'] === 'DELETE') {
                return RouteHandler::call($controllerMethod, $smarty, $plugin);
            }
        }
    }

    public static function update(String $controllerMethod, Object $smarty = null, Object $plugin = null)
    {
        if (isset($_POST['_method'])) {
            if ($_POST['_method'] === 'PUT') {
                return RouteHandler::call($controllerMethod, $smarty, $plugin);
            }
        }
    }

    public static function group(array $middlewares, array $controllersMethods, Object $smarty = null, Object $plugin = null)
    {
        array_map(function ($controllerMethod) use ($middlewares, $smarty, $plugin) {
            array_map(function ($middleware) {
                MiddlewareHandler::call($middleware);
            }, $middlewares);
            return RouteHandler::call($controllerMethod, $smarty, $plugin);
        }, $controllersMethods);
    }
}
