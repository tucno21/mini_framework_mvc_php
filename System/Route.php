<?php

namespace System;

use System\Request;


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
     * instanciando el objeto Request
     */
    public static Request $request;

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
        self::$request = new Request();
        return self::executeRoutes();
    }

    /**
     * ejecuta las rutas y su controlador
     * @return mixed
     */
    protected static function executeRoutes()
    {
        $callback = self::searchRoutes();
        return $callback;
    }

    /**
     * busca la ruta url en el array de rutas
     * @return mixed
     */
    protected static function searchRoutes()
    {
        //trae el HTTP GET o POST de la web
        $methodUrl = self::$request->methodWeb();
        //trae la url de la web
        $pathUrl = self::$request->getPath();

        //si el metodo es GET
        if ($methodUrl === 'get') {
            //busca la ruta en el array getRoutes
            $sendRoute = self::$getRoutes[$pathUrl] ?? null;
        } else {
            //busca la ruta en el array postRoutes
            $sendRoute = self::$postRoutes[$pathUrl] ?? null;
        }

        return $sendRoute;
    }
}
