<?php

namespace System;


/**
 * manejo de rutas GET y POST
 */

class Route
{
    /**
     * almacena las rutas y controladores
     * ["/" => [HomeController, "index"], "login" => [AuthController, "login"]]
     * @var array
     */
    protected static array $getRoutes = [];
    protected static array $postRoutes = [];

    /**
     * recibe el metodo  GET, el parametro de la url y el controlador o funcion
     * del archivo App/Config/Routes.php
     */
    public static function get($url, $controller)
    {
        self::$getRoutes[$url] = $controller;
    }

    /**
     * recibe el metodo  POST, el parametro de la url y el controlador o funcion
     * del archivo App/Config/Routes.php
     */
    public static function post($url, $controller)
    {
        self::$postRoutes[$url] = $controller;
    }

    /**
     * ejecuta la busqueda de rutas para los controladores
     */
    public static function run()
    {
        return self::$getRoutes;
    }
}
