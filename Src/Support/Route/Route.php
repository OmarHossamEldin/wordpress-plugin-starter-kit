<?php

namespace Wordpress\Support\Route;

use Wordpress\Exceptions\RouteNotFoundException;

class Route
{
    /**
     * plugin routes
     *
     * @var array
     */
    private static array $routes;

    /**
     * get request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function get($route, $action)
    {
        self::register($route, 'get', $action);
    }

    /**
     * post request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function post($route, $action)
    {
        self::register($route, 'post', $action);
    }

    /**
     * put request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function put($route, $action)
    {
        self::register($route, 'put', $action);
    }

    /**
     * patch request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function patch($route, $action)
    {
        self::register($route, 'patch', $action);
    }

    /**
     * delete request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function delete($route, $action)
    {
        self::register($route, 'delete', $action);
    }

    /**
     * register routes
     *
     * @param string $route
     * @param string $requestType
     * @param  $action
     * @return void
     */
    public static function register(string $route, string $requestType, $action)
    {
        self::$routes[$requestType][$route] = $action;
    }

    /**
     * resolve routes
     *
     * @param [string] $route
     * @param [string] $requestType
     * @return RouteHandler
     */
    public static function resolve(string $fetch, string $requestType)
    {
        $fetch = explode('?', $fetch)[1];
        $route = explode('=', $fetch)[1];

        $action = self::$routes[$requestType][$route] ?? null;
        if (!$action) {
            throw new RouteNotFoundException();
        }
        return RouteHandler::call($action);
    }

    public static function execute($controllerMethod)
    {
        return RouteHandler::call($controllerMethod);
    }

    public static function group(array $middlewares, callable $callback)
    {
        array_map(fn ($middleware) => MiddlewareHandler::call($middleware), $middlewares);
        return call_user_func($callback);
    }

    public static function  routes_list(): array
    {
        return self::$routes;
    }
}
