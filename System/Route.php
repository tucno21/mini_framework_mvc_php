<?php

namespace System;

use System\Request;
use System\RenderView;
use System\ResponseHTTP;


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
     * instanciando el objeto responseHTTP
     */
    public static ResponseHTTP $responseHTTP;
    /**
     * instanciando el objeto RenderView
     */
    public static RenderView $renderView;

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
        self::$responseHTTP = new ResponseHTTP();
        self::$renderView = new RenderView();
        return self::executeRoutes();
    }

    /**
     * ejecuta las rutas y su controlador
     * @return mixed
     */
    protected static function executeRoutes()
    {
        $callback = self::searchRoutes();

        /**
         * conprueba si el valor es un string get(clave, valor);
         * $routes->get('/', "Desde la url principal");
         */
        if (is_string($callback)) {
            echo 'es solo un string';
            exit;
        }

        /**
         * cuando los pathUrl no existe en el array de rutas
         * error 404
         */
        if ($callback == null) {
            self::$responseHTTP->setStatusCode(404);
            echo self::$renderView->render('error/404');
            exit;
        }
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
